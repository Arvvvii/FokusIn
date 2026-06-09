<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\AiSummary;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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
     * Tampilkan daftar post yang menunggu moderasi (belum diverifikasi).
     * GET /api/admin/moderation
     */
    public function moderation(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $posts = Post::with([
                    'user'     => fn($q) => $q->select('id', 'name', 'role'),
                    'category',
                ])
                ->where('is_verified', false)
                ->when($request->type, fn($q, $type) => $q->where('type', $type))
                ->latest()
                ->paginate(15);

            return response()->json([
                'message'              => 'Daftar konten yang menunggu moderasi.',
                'pending_count'        => Post::where('is_verified', false)->count(),
                'moderation_queue'     => $posts,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data moderasi.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Menampilkan rekap laporan pelanggaran.
     * GET /api/admin/reports
     *
     * Catatan: Jika tabel 'reports' belum ada, endpoint ini mengembalikan
     * array kosong agar frontend tidak crash (graceful degradation).
     */
    public function reports()
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            // Cek apakah model Report tersedia; jika belum, kembalikan data kosong
            if (!class_exists(\App\Models\Report::class)) {
                return response()->json([
                    'message' => 'Fitur laporan belum tersedia. Tabel reports belum dibuat.',
                    'total'   => 0,
                    'data'    => [],
                ]);
            }

            $reports = \App\Models\Report::with(['reporter' => fn($q) => $q->select('id', 'name')])
                ->latest()
                ->paginate(15);

            return response()->json($reports);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data laporan.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Statistik penggunaan AI (dari tabel ai_summaries).
     * GET /api/admin/ai-monitoring
     */
    public function aiMonitoring()
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $totalSummaries   = AiSummary::count();
            $summariesPerCat  = AiSummary::with('category:id,name')
                ->selectRaw('category_id, COUNT(*) as total')
                ->groupBy('category_id')
                ->get();

            // Total user aktif sebagai proxy request AI
            $totalUsers     = User::count();
            $totalTutors    = User::where('role', 'tutor')->count();
            $totalStudents  = User::where('role', 'pelajar')->count();

            return response()->json([
                'total_ai_summaries_generated' => $totalSummaries,
                'summaries_by_category'        => $summariesPerCat,
                'user_stats'                   => [
                    'total'    => $totalUsers,
                    'tutors'   => $totalTutors,
                    'students' => $totalStudents,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data AI monitoring.', 'error' => $e->getMessage()], 500);
        }
    }
}
