<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use App\Models\TutorReview;
use Illuminate\Http\Request;

class TutorAnalyticsController extends Controller
{
    /**
     * Helper: pastikan request datang dari tutor atau admin.
     */
    private function authorizeTutor(): ?\Illuminate\Http\JsonResponse
    {
        if (!in_array(auth()->user()->role, ['tutor', 'admin'])) {
            return response()->json(['message' => 'Akses ditolak. Hanya tutor yang diizinkan melihat analytics.'], 403);
        }
        return null;
    }

    /**
     * Performa tutor: total sesi, rating rata-rata, total siswa unik.
     * GET /api/tutor/analytics
     */
    public function analytics()
    {
        if ($deny = $this->authorizeTutor()) return $deny;

        try {
            $tutorId = auth()->id();

            // Total sesi per status
            $sessionStats = MentoringSession::where('tutor_id', $tutorId)
                ->selectRaw('status, COUNT(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status');

            $totalSessions   = MentoringSession::where('tutor_id', $tutorId)->count();
            $pendingSessions  = $sessionStats->get('pending', 0);
            $confirmedSessions = $sessionStats->get('confirmed', 0);
            $completedSessions = $sessionStats->get('completed', 0);

            // Total siswa unik yang pernah booking
            $totalUniqueStudents = MentoringSession::where('tutor_id', $tutorId)
                ->distinct('student_id')
                ->count('student_id');

            // Rating rata-rata dari tutor_reviews
            $averageRating  = TutorReview::where('tutor_id', $tutorId)->avg('rating');
            $totalReviews   = TutorReview::where('tutor_id', $tutorId)->count();

            // 5 review terbaru untuk ditampilkan
            $recentReviews  = TutorReview::where('tutor_id', $tutorId)
                ->with(['student' => fn($q) => $q->select('id', 'name')])
                ->latest()
                ->take(5)
                ->get();

            return response()->json([
                'sessions' => [
                    'total'     => $totalSessions,
                    'pending'   => $pendingSessions,
                    'confirmed' => $confirmedSessions,
                    'completed' => $completedSessions,
                ],
                'students' => [
                    'total_unique' => $totalUniqueStudents,
                ],
                'reviews' => [
                    'average_rating' => round($averageRating ?? 0, 2),
                    'total_reviews'  => $totalReviews,
                    'recent'         => $recentReviews,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data analytics tutor.', 'error' => $e->getMessage()], 500);
        }
    }
}
