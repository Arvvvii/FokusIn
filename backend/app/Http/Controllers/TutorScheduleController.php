<?php

namespace App\Http\Controllers;

use App\Models\TutorSchedule;
use Illuminate\Http\Request;

class TutorScheduleController extends Controller
{
    /**
     * Helper: pastikan request datang dari tutor.
     */
    private function authorizeTutor(): ?\Illuminate\Http\JsonResponse
    {
        if (!in_array(auth()->user()->role, ['tutor', 'admin'])) {
            return response()->json(['message' => 'Akses ditolak. Hanya tutor yang diizinkan mengelola jadwal.'], 403);
        }
        return null;
    }

    /**
     * Tampilkan jadwal milik tutor yang sedang login.
     * GET /api/tutor/schedule
     */
    public function index()
    {
        if ($deny = $this->authorizeTutor()) return $deny;

        try {
            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            $schedules = TutorSchedule::where('user_id', auth()->id())
                ->orderByRaw("FIELD(day_of_week, 'monday','tuesday','wednesday','thursday','friday','saturday','sunday')")
                ->get();

            return response()->json([
                'tutor_id'  => auth()->id(),
                'schedules' => $schedules,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil jadwal.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Batch upsert jadwal tutor yang login.
     * Kirim array 'schedules' berisi slot hari yang ingin di-set.
     * Slot yang tidak dikirim akan dihapus (replace seluruh jadwal).
     * POST /api/tutor/schedule
     *
     * Body contoh:
     * {
     *   "schedules": [
     *     { "day_of_week": "monday", "start_time": "08:00", "end_time": "12:00", "is_available": true },
     *     { "day_of_week": "wednesday", "start_time": "13:00", "end_time": "17:00", "is_available": true }
     *   ]
     * }
     */
    public function store(Request $request)
    {
        if ($deny = $this->authorizeTutor()) return $deny;

        try {
            $request->validate([
                'schedules'                   => 'required|array|min:1',
                'schedules.*.day_of_week'     => 'required|string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
                'schedules.*.start_time'      => 'required|date_format:H:i',
                'schedules.*.end_time'        => 'required|date_format:H:i|after:schedules.*.start_time',
                'schedules.*.is_available'    => 'sometimes|boolean',
            ]);

            $tutorId = auth()->id();

            // Hapus seluruh jadwal lama tutor ini, lalu insert ulang (replace strategy)
            TutorSchedule::where('user_id', $tutorId)->delete();

            $schedules = collect($request->schedules)->map(function ($slot) use ($tutorId) {
                return [
                    'user_id'      => $tutorId,
                    'day_of_week'  => $slot['day_of_week'],
                    'start_time'   => $slot['start_time'],
                    'end_time'     => $slot['end_time'],
                    'is_available' => $slot['is_available'] ?? true,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ];
            })->toArray();

            TutorSchedule::insert($schedules);

            $savedSchedules = TutorSchedule::where('user_id', $tutorId)
                ->orderByRaw("FIELD(day_of_week, 'monday','tuesday','wednesday','thursday','friday','saturday','sunday')")
                ->get();

            return response()->json([
                'message'   => 'Jadwal berhasil disimpan.',
                'schedules' => $savedSchedules,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan jadwal.', 'error' => $e->getMessage()], 500);
        }
    }
}
