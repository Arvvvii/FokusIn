<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MaterialController extends Controller
{
    /**
     * Return paginasi tabel materials.
     */
    public function index()
    {
        $materials = Material::with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ])->latest()->paginate(10);

        return response()->json($materials);
    }

    /**
     * Upload file ke Cloudinary dan simpan URL-nya ke tabel materials.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        // 2. Upload file ke Cloudinary
        $uploadedFile = cloudinary()->uploadApi()->upload($request->file('file')->getRealPath());
        $fileUrl = $uploadedFile['secure_url'];
        $cloudinaryPublicId = $uploadedFile['public_id'];

        // 3. Simpan ke database
        $material = Material::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'file_url' => $fileUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
        ]);

        $material->load([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ]);

        return response()->json($material, 201);
    }

    /**
     * Return detail material.
     */
    public function show($id)
    {
        $material = Material::with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ])->findOrFail($id);

        return response()->json($material);
    }

    /**
     * Hapus material dan file pendukung dari Cloudinary.
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        // Hanya tutor pembuat materi atau admin yang boleh menghapus materi
        if (auth()->id() !== $material->user_id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Anda tidak memiliki hak untuk menghapus materi ini.'], 403);
        }

        // Hapus file dari Cloudinary
        if ($material->cloudinary_public_id) {
            cloudinary()->uploadApi()->destroy($material->cloudinary_public_id);
        }

        $material->delete();

        return response()->json(['message' => 'Materi berhasil dihapus dari sistem.']);
    }
}
