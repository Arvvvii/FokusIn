<?php

namespace App\Http\Controllers;

use App\Models\QuizSet;
use Illuminate\Http\Request;

class AdminQuizController extends Controller
{
    /**
     * Helper: pastikan request datang dari admin atau tutor.
     */
    private function authorizeAdminOrTutor(): ?\Illuminate\Http\JsonResponse
    {
        if (!in_array(auth()->user()->role, ['admin', 'tutor'])) {
            return response()->json(['message' => 'Akses ditolak. Hanya admin atau tutor yang diizinkan.'], 403);
        }
        return null;
    }

    /**
     * Buat kuis baru.
     * POST /api/quizzes
     */
    public function store(Request $request)
    {
        if ($deny = $this->authorizeAdminOrTutor()) return $deny;

        try {
            $validated = $request->validate([
                'title'       => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
            ]);

            $quiz = QuizSet::create($validated);
            $quiz->load('category');

            return response()->json([
                'message' => 'Kuis berhasil dibuat.',
                'quiz'    => $quiz,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat kuis.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update data kuis (title atau category_id).
     * PUT /api/quizzes/{id}
     */
    public function update(Request $request, $id)
    {
        if ($deny = $this->authorizeAdminOrTutor()) return $deny;

        try {
            $quiz = QuizSet::findOrFail($id);

            $validated = $request->validate([
                'title'       => 'sometimes|string|max:255',
                'category_id' => 'sometimes|exists:categories,id',
            ]);

            $quiz->update($validated);
            $quiz->load('category');

            return response()->json([
                'message' => 'Kuis berhasil diperbarui.',
                'quiz'    => $quiz,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kuis tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui kuis.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Hapus kuis beserta semua soal dan attempt-nya (via cascade di DB).
     * DELETE /api/quizzes/{id}
     */
    public function destroy($id)
    {
        if ($deny = $this->authorizeAdminOrTutor()) return $deny;

        try {
            $quiz = QuizSet::findOrFail($id);
            $quiz->delete();

            return response()->json(['message' => 'Kuis berhasil dihapus.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kuis tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus kuis.', 'error' => $e->getMessage()], 500);
        }
    }
}
