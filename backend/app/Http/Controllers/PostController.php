<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
}
