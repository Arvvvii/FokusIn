<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Report;
use App\Models\MentoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Middleware guard: pastikan hanya admin yang bisa akses semua method di controller ini.
     * (Validasi role dilakukan di tiap method untuk fleksibilitas)
     */
    private function authorizeAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang memiliki akses ke endpoint ini.');
        }
    }

    // =========================================================================
    // ── MODERATION
    // =========================================================================

    /**
     * DELETE /api/admin/moderation/posts/{id}
     * Hapus post yang melanggar (moderasi konten).
     */
    public function deletePost($id)
    {
        $this->authorizeAdmin();

        try {
            $post = Post::findOrFail($id);
            $post->delete();

            return response()->json([
                'message' => "Post dengan ID #{$id} berhasil dihapus oleh moderator.",
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Post tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // ── REPORTS
    // =========================================================================

    /**
     * GET /api/admin/reports
     * Kembalikan daftar semua laporan dari tabel reports (dengan paginasi).
     */
    public function getReports(Request $request)
    {
        $this->authorizeAdmin();

        try {
            $query = Report::with([
                'reporter:id,name,email,role',
            ]);

            // Filter opsional berdasarkan status
            if ($request->has('status') && in_array($request->status, ['pending', 'resolved'])) {
                $query->where('status', $request->status);
            }

            // Filter opsional berdasarkan tipe yang dilaporkan
            if ($request->has('reported_type') && in_array($request->reported_type, ['post', 'user'])) {
                $query->where('reported_type', $request->reported_type);
            }

            $reports = $query->latest()->paginate(15);

            return response()->json($reports);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * PATCH /api/admin/reports/{id}/resolve
     * Tandai laporan sebagai 'resolved'.
     */
    public function resolveReport($id)
    {
        $this->authorizeAdmin();

        try {
            $report = Report::findOrFail($id);
            $report->update(['status' => 'resolved']);

            return response()->json([
                'message' => 'Laporan berhasil ditandai sebagai selesai.',
                'report'  => $report,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Laporan tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // ── ANALYTICS TIMELINE
    // =========================================================================

    /**
     * GET /api/admin/analytics/timeline
     * Kembalikan data jumlah registrasi user baru per bulan & jumlah post per bulan
     * untuk 12 bulan terakhir.
     */
    public function analyticsTimeline()
    {
        $this->authorizeAdmin();

        try {
            // Jumlah registrasi user baru per bulan (12 bulan terakhir)
            $userRegistrations = User::select(
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                    DB::raw('COUNT(*) as total')
                )
                ->where('created_at', '>=', now()->subMonths(12)->startOfMonth())
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            // Jumlah post baru per bulan (12 bulan terakhir)
            $postCounts = Post::select(
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                    DB::raw('COUNT(*) as total')
                )
                ->where('created_at', '>=', now()->subMonths(12)->startOfMonth())
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            return response()->json([
                'user_registrations_per_month' => $userRegistrations,
                'posts_per_month'              => $postCounts,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
