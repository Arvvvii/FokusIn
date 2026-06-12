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
        // Cek Role (Hanya Admin dan Tutor yang boleh upload)
        if (!in_array(auth()->user()->role, ['admin', 'tutor'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // 1. Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png,mp4,pptx,docx', // Max 10MB
        ]);

        // 2. Upload file ke Cloudinary
        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $resourceType = 'raw';
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $resourceType = 'image';
            $publicId = 'fokusin_' . uniqid();
        } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'webm'])) {
            $resourceType = 'video';
            $publicId = 'fokusin_' . uniqid();
        } else {
            $resourceType = 'raw';
            $publicId = 'fokusin_' . uniqid() . '.' . $extension;
        }

        $uploadedFile = cloudinary()->uploadApi()->upload($file->getRealPath(), [
            'resource_type' => $resourceType,
            'public_id' => $publicId,
        ]);
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
            $ext = pathinfo($material->file_url, PATHINFO_EXTENSION);
            $resourceType = 'raw';
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $resourceType = 'image';
            } elseif (in_array(strtolower($ext), ['mp4', 'avi', 'mov', 'webm'])) {
                $resourceType = 'video';
            }
            cloudinary()->uploadApi()->destroy($material->cloudinary_public_id, [
                'resource_type' => $resourceType
            ]);
        }

        $material->delete();

        return response()->json(['message' => 'Materi berhasil dihapus dari sistem.']);
    }
}
