<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\ExamUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Kembalikan data user, relasi badges, dan hitung virtual field (total_posts, total_answers).
     */
    public function profile($id)
    {
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
        $totalUsers = User::count();

        $postsQuery = Post::query();
        if (Schema::hasColumn('posts', 'type')) {
            $postsQuery->where('type', 'question');
        }
        $totalQuestions = $postsQuery->count();

        $totalExamUploads = ExamUpload::count();

        return response()->json([
            'total_users' => $totalUsers,
            'total_posts' => $totalQuestions,
            'total_exam_uploads' => $totalExamUploads,
        ]);
    }
}
