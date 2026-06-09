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
     * GET /api/student/dashboard
     */
    public function student(Request $request)
    {
        try {
            $user = $request->user();

            $totalMentoringSessions = MentoringSession::where('student_id', $user->id)
                ->whereIn('status', ['confirmed', 'completed'])
                ->count();

            $postsQuery = Post::where('user_id', $user->id);
            if (Schema::hasColumn('posts', 'type')) {
                $postsQuery->where('type', 'question');
            }
            $totalForumPosts = $postsQuery->count();

            $totalQuizAttempts = QuizAttempt::where('user_id', $user->id)->count();

            return response()->json([
                'total_mentoring_sessions' => $totalMentoringSessions,
                'total_forum_posts'        => $totalForumPosts,
                'total_quiz_attempts'      => $totalQuizAttempts,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil dashboard pelajar.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Dashboard Tutor — metrik statistik untuk tutor yang sedang login.
     * GET /api/tutor/dashboard
     */
    public function tutor(Request $request)
    {
        try {
            $user = $request->user();

            $pendingRequests = MentoringSession::where('tutor_id', $user->id)
                ->where('status', 'pending')
                ->count();

            $completedSessions = MentoringSession::where('tutor_id', $user->id)
                ->where('status', 'completed')
                ->count();

            $averageRating = TutorReview::where('tutor_id', $user->id)->avg('rating');

            return response()->json([
                'pending_requests'   => $pendingRequests,
                'completed_sessions' => $completedSessions,
                'average_rating'     => round($averageRating ?? 0, 2),
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil dashboard tutor.', 'error' => $e->getMessage()], 500);
        }
    }
}
