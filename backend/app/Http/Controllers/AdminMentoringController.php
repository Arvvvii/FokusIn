<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

    /**
     * Tentukan kolom yang aman untuk di-select pada relasi User,
     * dengan cek dinamis apakah kolom avatar_url benar-benar ada di tabel.
     */
    private function userSelectColumns(array $extra = []): array
    {
        $base = ['id', 'name', 'email', 'role'];

        // avatar_url adalah accessor/appended attribute, bukan kolom fisik —
        // jangan dimasukkan dalam array select() agar tidak error.
        // Ia akan muncul otomatis di JSON output karena $appends di model User.

        return array_merge($base, $extra);
    }

    // =========================================================================
    // GET /api/admin/mentoring
    // List semua mentoring_sessions beserta relasi student dan tutor.
    // =========================================================================
    public function index(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        // ── 1. Ambil data paginasi (ini HARUS berhasil) ───────────────────────
        try {
            $query = MentoringSession::query();

            // Eager load relasi student & tutor dengan kolom yang aman
            $userCols = $this->userSelectColumns();
            $query->with([
                'student' => fn ($q) => $q->select($userCols),
                'tutor'   => fn ($q) => $q->select($userCols),
            ]);

            // Filter opsional: status
            if ($request->filled('status') &&
                in_array($request->status, ['pending', 'confirmed', 'completed', 'cancelled'])) {
                $query->where('status', $request->status);
            }

            // Filter opsional: tutor_id
            if ($request->filled('tutor_id') && is_numeric($request->tutor_id)) {
                $query->where('tutor_id', $request->tutor_id);
            }

            // Filter opsional: student_id
            if ($request->filled('student_id') && is_numeric($request->student_id)) {
                $query->where('student_id', $request->student_id);
            }

            $sessions = $query->latest()->paginate(20);

        } catch (\Exception $e) {
            // Jika kueri utama sendiri gagal, baru kembalikan 500
            return response()->json([
                'message' => 'Gagal mengambil data sesi mentoring.',
                'error'   => $e->getMessage(),
            ], 500);
        }

        // ── 2. Hitung statistik agregat (jika gagal, fallback ke 0) ──────────
        $stats = [
            'total'     => 0,
            'pending'   => 0,
            'confirmed' => 0,
            'completed' => 0,
            'cancelled' => 0,
        ];

        try {
            // Hitung semua status dalam satu query agregat (lebih efisien)
            $counts = MentoringSession::selectRaw("
                COUNT(*) as total,
                SUM(CASE WHEN status = 'pending'   THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed,
                SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
                SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) as cancelled
            ")->first();

            if ($counts) {
                $stats = [
                    'total'     => (int) ($counts->total     ?? 0),
                    'pending'   => (int) ($counts->pending   ?? 0),
                    'confirmed' => (int) ($counts->confirmed ?? 0),
                    'completed' => (int) ($counts->completed ?? 0),
                    'cancelled' => (int) ($counts->cancelled ?? 0),
                ];
            }
        } catch (\Exception) {
            // Stats gagal dihitung — tetap kembalikan data paginasi dengan stats default
        }

        return response()->json([
            'sessions' => $sessions,
            'stats'    => $stats,
        ]);
    }

    // =========================================================================
    // GET /api/admin/mentoring/{id}
    // Detail satu sesi mentoring lengkap.
    // =========================================================================
    public function show($id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $userCols = $this->userSelectColumns(['reputation_score']);

            // Load relasi dasar (student & tutor) — selalu aman
            $session = MentoringSession::with([
                'student' => fn ($q) => $q->select($userCols),
                'tutor'   => fn ($q) => $q->select($userCols),
            ])->findOrFail($id);

            // Load relasi tutorProfile secara terpisah dengan try-catch,
            // agar jika tabel/relasi belum ada tidak merusak response utama
            try {
                $session->load('tutor.tutorProfile');
            } catch (\Exception) {
                // tutorProfile tidak tersedia — lanjutkan tanpa relasi ini
            }

            return response()->json($session);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Sesi mentoring tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil detail sesi.',
                'error'   => $e->getMessage(),
            ], 500);
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

            // Reload dengan relasi — gunakan kolom aman (tanpa avatar_url di select)
            $userCols = $this->userSelectColumns();
            $session->load([
                'student' => fn ($q) => $q->select($userCols),
                'tutor'   => fn ($q) => $q->select($userCols),
            ]);

            return response()->json([
                'message' => 'Status sesi mentoring berhasil diubah oleh admin.',
                'session' => $session,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e; // Biarkan Laravel kembalikan 422 otomatis
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Sesi mentoring tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengubah status sesi.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
