<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Helper: pastikan request datang dari admin.
     */
    private function authorizeAdmin(): ?\Illuminate\Http\JsonResponse
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak. Hanya admin yang dapat mengelola kategori.'], 403);
        }
        return null;
    }

    // =========================================================================
    // GET /api/categories
    // List semua kategori (publik — sudah ada di routes, ini versi yang diperkaya).
    // =========================================================================
    public function index()
    {
        try {
            $categories = Category::withCount([
                'posts',
                'materials',
                'quizSets',
                'examUploads',
            ])->orderBy('name', 'asc')->get();

            return response()->json($categories);
        } catch (\Exception $e) {
            // Fallback: jika relasi count tidak ada, kembalikan data mentah
            $categories = Category::orderBy('name', 'asc')->get();
            return response()->json($categories);
        }
    }

    // =========================================================================
    // POST /api/admin/categories
    // Buat kategori baru (khusus admin).
    // =========================================================================
    public function store(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $validated = $request->validate([
                'name'        => 'required|string|max:255|unique:categories,name',
                'description' => 'nullable|string|max:1000',
                'icon'        => 'nullable|string|max:100',
            ]);

            $category = Category::create($validated);

            return response()->json([
                'message'  => 'Kategori berhasil dibuat.',
                'category' => $category,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat kategori.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // PUT /api/admin/categories/{id}
    // Update kategori (khusus admin).
    // =========================================================================
    public function update(Request $request, $id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $category = Category::findOrFail($id);

            $validated = $request->validate([
                'name'        => 'sometimes|string|max:255|unique:categories,name,' . $id,
                'description' => 'nullable|string|max:1000',
                'icon'        => 'nullable|string|max:100',
            ]);

            $category->update($validated);

            return response()->json([
                'message'  => 'Kategori berhasil diperbarui.',
                'category' => $category->fresh(),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kategori tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui kategori.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // DELETE /api/admin/categories/{id}
    // Hapus kategori (khusus admin).
    // =========================================================================
    public function destroy($id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json(['message' => 'Kategori berhasil dihapus.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kategori tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus kategori.', 'error' => $e->getMessage()], 500);
        }
    }
}
