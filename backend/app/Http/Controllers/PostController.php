<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Vote;
use App\Services\ReputationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PostController extends Controller
{
    /**
     * Return response JSON berisi semua data dari model Category.
     */
    public function categories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Return paginasi daftar Post (type = 'question').
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // Cek secara dinamis jika kolom 'type' ada di tabel posts sebelum memfilter
        if (Schema::hasColumn('posts', 'type')) {
            $query->where('type', 'question');
        }

        // Lakukan eager loading relasi user (ambil id, name, role, avatar_url secara dinamis) dan category
        $query->with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                // Cek secara dinamis jika kolom 'avatar_url' ada di tabel users
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ]);

        // Filter opsional berdasarkan category_id
        if ($request->has('category_id') && !is_null($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // Return paginasi daftar Post
        $posts = $query->latest()->paginate(10);

        return response()->json($posts);
    }

    /**
     * Simpan Post baru (type = 'question', is_verified = false, user_id = auth()->id()).
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 2. Siapkan data untuk disimpan
        $data = [
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'is_verified' => false,
        ];

        // Tambahkan kolom 'type' jika terdefinisi di database
        if (Schema::hasColumn('posts', 'type')) {
            $data['type'] = 'question';
        }

        // 3. Simpan Post baru
        $post = Post::create($data);

        // 4. Beri +5 poin reputasi kepada pembuat pertanyaan
        ReputationService::add(auth()->id(), 5);

        // Muat relasi user dan category untuk kemudahan frontend
        $post->load([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ]);

        // 5. Return JSON data post dengan status 201
        return response()->json($post, 201);
    }

    /**
     * Menangani voting post (upvote / downvote).
     */
    public function vote(Request $request, $id)
    {
        // 1. Validasi input
        $request->validate([
            'vote_type' => 'required|in:up,down',
        ]);

        $post = Post::findOrFail($id);
        $voterId = auth()->id();
        $authorId = $post->user_id;

        // Cek apakah user sudah melakukan voting pada post ini sebelumnya
        $existingVote = Vote::where('user_id', $voterId)
                            ->where('post_id', $post->id)
                            ->first();

        if ($existingVote) {
            if ($existingVote->vote_type === $request->vote_type) {
                // Kasus 1: Toggle Off (User membatalkan vote)
                $existingVote->delete();

                if ($request->vote_type === 'up') {
                    ReputationService::deduct($authorId, 5);
                } else {
                    ReputationService::add($authorId, 2);
                }

                return response()->json([
                    'message' => 'Vote berhasil dibatalkan.',
                    'vote_type' => null
                ]);
            } else {
                // Kasus 2: Ganti Vote (up -> down / down -> up)
                $existingVote->update(['vote_type' => $request->vote_type]);

                if ($request->vote_type === 'up') {
                    // down -> up: kembalikan reputasi down (+2) dan tambahkan up (+5) = +7
                    ReputationService::add($authorId, 7);
                } else {
                    // up -> down: kurangi reputasi up (-5) dan kurangi down (-2) = -7
                    ReputationService::deduct($authorId, 7);
                }

                return response()->json([
                    'message' => 'Vote berhasil diubah.',
                    'vote_type' => $request->vote_type,
                    'vote' => $existingVote
                ]);
            }
        } else {
            // Kasus 3: Vote Baru
            $vote = Vote::create([
                'user_id' => $voterId,
                'post_id' => $post->id,
                'vote_type' => $request->vote_type,
            ]);

            if ($request->vote_type === 'up') {
                ReputationService::add($authorId, 5);
            } else {
                ReputationService::deduct($authorId, 2);
            }

            return response()->json([
                'message' => 'Vote berhasil disimpan.',
                'vote_type' => $request->vote_type,
                'vote' => $vote
            ], 201);
        }
    }

    /**
     * Memverifikasi post (Khusus Tutor / Admin).
     */
    public function verify($id)
    {
        $user = auth()->user();

        // Khusus tutor / admin
        if (!in_array($user->role, ['tutor', 'admin'])) {
            return response()->json(['message' => 'Hanya tutor atau admin yang berhak memverifikasi postingan.'], 403);
        }

        $post = Post::findOrFail($id);
        $post->update(['is_verified' => true]);

        return response()->json([
            'message' => 'Postingan berhasil diverifikasi.',
            'post' => $post
        ]);
    }

    /**
     * Menetapkan jawaban terbaik (Best Answer) dan memberi poin reputasi.
     */
    public function setBestAnswer($id)
    {
        $answer = Post::findOrFail($id);

        // Pastikan model bertipe 'answer'
        if (Schema::hasColumn('posts', 'type') && $answer->type !== 'answer') {
            return response()->json(['message' => 'Post ini bukan sebuah jawaban.'], 400);
        }

        // Opsional: Batasi agar jawaban terbaik sebelumnya untuk pertanyaan ini di-reset menjadi false
        if (Schema::hasColumn('posts', 'parent_id')) {
            Post::where('parent_id', $answer->parent_id)->update(['is_best_answer' => false]);
        }

        $answer->update(['is_best_answer' => true]);

        // Beri +15 poin reputasi ke penjawab (pemilik post jawaban)
        ReputationService::add($answer->user_id, 15);

        return response()->json([
            'message' => 'Jawaban terbaik berhasil ditetapkan.',
            'post' => $answer
        ]);
    }
}
