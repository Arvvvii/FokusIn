<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use Illuminate\Http\Request;

class AdminMentoringController extends Controller
{
    /**
     * Helper: pastikan request datang dari admin.
     */
    private function authorizeAdmin(): ?\Illuminate\Http\JsonResponse
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak. Hanya admin yang diizinkan.'], 403);
        }
        return null;
    }

    // =========================================================================
    // GET /api/admin/mentoring
    // List semua mentoring_sessions beserta relasi student dan tutor.
    // =========================================================================
    public function index(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $query = MentoringSession::with([
                'student:id,name,email,avatar_url',
                'tutor:id,name,email,avatar_url',
            ]);

            // Filter opsional berdasarkan status sesi
            if ($request->has('status') && in_array($request->status, ['pending', 'confirmed', 'completed', 'cancelled'])) {
                $query->where('status', $request->status);
            }

            // Filter opsional berdasarkan tutor_id
            if ($request->has('tutor_id')) {
                $query->where('tutor_id', $request->tutor_id);
            }

            // Filter opsional berdasarkan student_id
            if ($request->has('student_id')) {
                $query->where('student_id', $request->student_id);
            }

            $sessions = $query->latest()->paginate(20);

            // Tambahkan ringkasan statistik di response header
            $stats = [
                'total'     => MentoringSession::count(),
                'pending'   => MentoringSession::where('status', 'pending')->count(),
                'confirmed' => MentoringSession::where('status', 'confirmed')->count(),
                'completed' => MentoringSession::where('status', 'completed')->count(),
                'cancelled' => MentoringSession::where('status', 'cancelled')->count(),
            ];

            return response()->json([
                'data'  => $sessions,
                'stats' => $stats,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data sesi mentoring.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // GET /api/admin/mentoring/{id}
    // Detail satu sesi mentoring lengkap.
    // =========================================================================
    public function show($id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $session = MentoringSession::with([
                'student:id,name,email,reputation_score,avatar_url',
                'tutor:id,name,email,reputation_score,avatar_url',
                'tutor.tutorProfile',
            ])->findOrFail($id);

            return response()->json($session);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Sesi mentoring tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil detail sesi.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // PATCH /api/admin/mentoring/{id}/status
    // Paksa ubah status sesi (admin override).
    // =========================================================================
    public function forceUpdateStatus(Request $request, $id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $validated = $request->validate([
                'status' => 'required|in:pending,confirmed,completed,cancelled',
            ]);

            $session = MentoringSession::findOrFail($id);
            $session->update(['status' => $validated['status']]);

            return response()->json([
                'message' => 'Status sesi mentoring berhasil diubah oleh admin.',
                'session' => $session->fresh()->load(['student:id,name', 'tutor:id,name']),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Sesi mentoring tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengubah status sesi.', 'error' => $e->getMessage()], 500);
        }
    }
}
