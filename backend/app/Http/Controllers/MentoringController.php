<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use App\Models\User;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    /**
     * Tampilkan daftar tutor yang tersedia (terverifikasi).
     * PUBLIC — tidak memerlukan autentikasi.
     */
    public function listTutors(Request $request)
    {
        $tutors = User::where('role', 'tutor')
            // ->where('is_verified', true)
            ->with('badges')
            ->withCount('sessionsAsTutor as session_count')
            ->paginate(12);

        return response()->json($tutors);
    }

    /**
     * Pelajar memesan (booking) sesi mentoring baru.
     * PROTECTED — memerlukan auth:sanctum.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'tutor_id'        => 'required|exists:users,id',
            'title'           => 'required|string|max:255',
            'description'     => 'required|string|min:20',
            'duration_minutes' => 'required|in:30,60,90',
            'student_message' => 'nullable|string|max:500',
        ]);

        // 2. Validasi bisnis: tidak boleh booking diri sendiri
        if ($request->tutor_id == auth()->id()) {
            return response()->json([
                'message' => 'Anda tidak dapat memesan sesi mentoring dengan diri sendiri.'
            ], 422);
        }

        // 3. Pastikan target user memang tutor
        $tutor = User::where('id', $request->tutor_id)
            ->where('role', 'tutor')
            ->first();

        if (!$tutor) {
            return response()->json([
                'message' => 'User yang dipilih bukan seorang tutor.'
            ], 422);
        }

        // 4. Buat sesi mentoring baru
        $session = MentoringSession::create([
            'tutor_id'         => $request->tutor_id,
            'student_id'       => auth()->id(),
            'title'            => $request->title,
            'description'      => $request->description,
            'duration_minutes' => $request->duration_minutes,
            'student_message'  => $request->student_message,
            'status'           => 'pending',
            'price'            => 25000,
        ]);

        // 5. Load relasi untuk response
        $session->load(['tutor:id,name,email,role', 'student:id,name,email,role']);

        return response()->json($session, 201);
    }

    /**
     * Perbarui status sesi mentoring.
     * PROTECTED — memerlukan auth:sanctum.
     *
     * Aturan otorisasi:
     * - 'confirmed' / 'completed' → hanya Tutor pemilik sesi.
     * - 'cancelled' → hanya Student pemilik sesi DAN status saat ini masih 'pending'.
     */
    public function updateStatus(Request $request, $id)
    {
        // 1. Validasi input
        $request->validate([
            'status' => 'required|in:confirmed,completed,cancelled',
        ]);

        // 2. Ambil data sesi
        $session = MentoringSession::findOrFail($id);

        $newStatus = $request->status;

        // 3. Logika otorisasi
        if (in_array($newStatus, ['confirmed', 'completed'])) {
            // Hanya tutor yang boleh confirm / complete
            if (auth()->id() !== $session->tutor_id) {
                return response()->json([
                    'message' => 'Hanya tutor yang dapat mengonfirmasi atau menyelesaikan sesi ini.'
                ], 403);
            }
        } elseif ($newStatus === 'cancelled') {
            // Hanya student yang boleh cancel, dan hanya jika status masih pending
            if (auth()->id() !== $session->student_id) {
                return response()->json([
                    'message' => 'Hanya pelajar yang dapat membatalkan sesi ini.'
                ], 403);
            }

            if ($session->status !== 'pending') {
                return response()->json([
                    'message' => 'Sesi hanya dapat dibatalkan jika statusnya masih pending.'
                ], 403);
            }
        }

        // 4. Update status
        $session->status = $newStatus;
        $session->save();

        // 5. Load relasi untuk response
        $session->load(['tutor:id,name,email,role', 'student:id,name,email,role']);

        return response()->json([
            'message' => 'Status sesi berhasil diperbarui.',
            'session' => $session,
        ]);
    }
}
