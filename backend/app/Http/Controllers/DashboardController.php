<?php

namespace App\Http\Controllers;

use App\Models\MentoringSession;
use App\Models\Post;
use App\Models\QuizAttempt;
use App\Models\TutorReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    /**
     * Dashboard Pelajar — metrik statistik untuk student yang sedang login.
     * PROTECTED — memerlukan auth:sanctum.
     * GET /api/student/dashboard
     */
    public function student(Request $request)
    {
        try {
            $user = $request->user();

            // Total sesi mentoring yang pernah diikuti (status confirmed / completed)
            $totalMentoringSessions = MentoringSession::where('student_id', $user->id)
                ->whereIn('status', ['confirmed', 'completed'])
                ->count();

            // Total post forum yang dibuat
            $postsQuery = Post::where('user_id', $user->id);
            if (Schema::hasColumn('posts', 'type')) {
                $postsQuery->where('type', 'question');
            }
            $totalForumPosts = $postsQuery->count();

            // Total kuis yang dikerjakan
            $totalQuizAttempts = QuizAttempt::where('user_id', $user->id)->count();

            return response()->json([
                'total_mentoring_sessions' => $totalMentoringSessions,
                'total_forum_posts'        => $totalForumPosts,
                'total_quiz_attempts'      => $totalQuizAttempts,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil data dashboard pelajar.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Dashboard Tutor — metrik statistik untuk tutor yang sedang login.
     * PROTECTED — memerlukan auth:sanctum.
     * GET /api/tutor/dashboard
     */
    public function tutor(Request $request)
    {
        try {
            $user = $request->user();

            // Total request sesi mentoring yang masih pending
            $pendingRequests = MentoringSession::where('tutor_id', $user->id)
                ->where('status', 'pending')
                ->count();

            // Total sesi yang sudah completed
            $completedSessions = MentoringSession::where('tutor_id', $user->id)
                ->where('status', 'completed')
                ->count();

            // Rating rata-rata dari tabel tutor_reviews
            $averageRating = TutorReview::where('tutor_id', $user->id)->avg('rating');

            return response()->json([
                'pending_requests'    => $pendingRequests,
                'completed_sessions'  => $completedSessions,
                'average_rating'      => round($averageRating ?? 0, 2),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil data dashboard tutor.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
