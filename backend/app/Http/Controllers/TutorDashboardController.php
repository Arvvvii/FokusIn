<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorDashboardController extends Controller
{
    /**
     * GET /api/tutor/analytics/timeline
     * Kembalikan jumlah sesi mentoring per bulan untuk tutor yang sedang login
     * (12 bulan terakhir).
     */
    public function analyticsTimeline()
    {
        $user = auth()->user();

        // Pastikan hanya tutor/admin yang bisa akses
        if (!in_array($user->role, ['tutor', 'admin'])) {
            return response()->json(['message' => 'Hanya tutor yang dapat mengakses endpoint ini.'], 403);
        }

        try {
            $sessions = MentoringSession::select(
                    DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
                    DB::raw('COUNT(*) as total_sessions')
                )
                ->where('tutor_id', $user->id)
                ->where('created_at', '>=', now()->subMonths(12)->startOfMonth())
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();

            return response()->json([
                'tutor_id'              => $user->id,
                'tutor_name'            => $user->name,
                'sessions_per_month'    => $sessions,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
