<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\ExamUpload;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Kembalikan data user, relasi badges, dan hitung virtual field (total_posts, total_answers).
     */
    public function profile($id)
    {
        $targetUser = User::findOrFail($id);

        // Otorisasi: Hanya pemilik profil atau admin yang diizinkan melihat profil lengkap
        \Illuminate\Support\Facades\Gate::authorize('view', $targetUser);

        $user = User::with('badges')
            ->withCount([
                'posts as total_posts' => function ($q) {
                    if (Schema::hasColumn('posts', 'type')) {
                        $q->where('type', 'question');
                    }
                },
                'posts as total_answers' => function ($q) {
                    if (Schema::hasColumn('posts', 'type')) {
                        $q->where('type', 'answer');
                    } else {
                        $q->whereRaw('1 = 0');
                    }
                }
            ])
            ->findOrFail($id);

        return response()->json($user);
    }

    /**
     * Kembalikan jumlah total user, post (pertanyaan), dan exam_uploads di sistem.
     */
    public function globalStats()
    {
        try {
            $totalUsers = User::count();

            $postsQuery = Post::query();
            if (Schema::hasColumn('posts', 'type')) {
                $postsQuery->where('type', 'question');
            }
            $totalQuestions = $postsQuery->count();

            $totalExamUploads = ExamUpload::count();

            $totalTutors = User::role('tutor')->count();

            $avgRating = Testimonial::avg('rating');
            $satisfactionRate = is_null($avgRating) ? 95 : round(($avgRating / 5) * 100);

            return response()->json([
                'success' => true,
                'data' => [
                    'total_users' => $totalUsers,
                    'total_posts' => $totalQuestions,
                    'total_exam_uploads' => $totalExamUploads,
                    'total_tutors' => $totalTutors,
                    'satisfaction_rate' => $satisfactionRate,
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error fetching global stats: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Internal server error while fetching stats.'
            ], 500);
        }
    }
}
