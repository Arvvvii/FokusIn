<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\ExamUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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
     * Update profil user (name, bio, password opsional).
     * PROTECTED — memerlukan auth:sanctum.
     * PUT /api/users/{id}
     */
    public function updateProfile(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Authorization: hanya boleh update profil milik sendiri
            if ((int) $id !== auth()->id()) {
                return response()->json([
                    'message' => 'Anda hanya dapat mengubah profil milik sendiri.'
                ], 403);
            }

            // Validasi input
            $rules = [
                'name'     => 'sometimes|string|max:255',
                'password' => 'sometimes|string|min:8|confirmed',
            ];

            // Tambahkan validasi bio hanya jika kolom tersedia di tabel users
            if (Schema::hasColumn('users', 'bio')) {
                $rules['bio'] = 'sometimes|nullable|string|max:1000';
            }

            $validated = $request->validate($rules);

            // Update name jika ada
            if (isset($validated['name'])) {
                $user->name = $validated['name'];
            }

            // Update bio jika ada dan kolom tersedia
            if (isset($validated['bio']) && Schema::hasColumn('users', 'bio')) {
                $user->bio = $validated['bio'];
            }

            // Update password jika diisi
            if (isset($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }

            $user->save();

            return response()->json([
                'message' => 'Profil berhasil diperbarui.',
                'user'    => $user,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui profil.',
                'error'   => $e->getMessage(),
            ], 500);
        }
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
