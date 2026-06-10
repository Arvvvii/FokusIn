<?php

namespace App\Http\Controllers;

use App\Models\QuizSet;
use App\Models\QuizAttempt;
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

    // =========================================================================
    // GET /api/admin/quizzes/{id}
    // Detail kuis beserta statistik attempt (average_score, anomalies_detected).
    // =========================================================================
    public function show($id)
    {
        if ($deny = $this->authorizeAdminOrTutor()) return $deny;

        try {
            $quiz = QuizSet::with(['category', 'questions'])->findOrFail($id);

            // Hitung statistik attempt dari tabel quiz_attempts
            $attemptStats = QuizAttempt::where('quiz_set_id', $id)
                ->selectRaw('
                    COUNT(*) as total_attempts,
                    AVG(score) as average_score,
                    MAX(score) as highest_score,
                    MIN(score) as lowest_score
                ')
                ->first();

            $avgScore = $attemptStats->average_score !== null
                ? round($attemptStats->average_score, 1)
                : null;

            // Deteksi anomali sederhana:
            // Dianggap anomali jika ada user yang mengerjakan kuis yang sama > 10x dalam sehari
            $anomalyCount = QuizAttempt::where('quiz_set_id', $id)
                ->selectRaw('user_id, DATE(created_at) as attempt_date, COUNT(*) as daily_count')
                ->groupBy('user_id', 'attempt_date')
                ->havingRaw('COUNT(*) > 10')
                ->count();

            return response()->json([
                'quiz'               => $quiz,
                'total_attempts'     => (int) ($attemptStats->total_attempts ?? 0),
                'average_score'      => $avgScore,
                'highest_score'      => $attemptStats->highest_score,
                'lowest_score'       => $attemptStats->lowest_score,
                'anomalies_detected' => $anomalyCount > 0,
                'anomaly_count'      => $anomalyCount,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kuis tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil detail kuis.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // POST /api/admin/quizzes
    // Buat kuis baru.
    // =========================================================================
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

    // =========================================================================
    // PUT /api/admin/quizzes/{id}
    // Update data kuis.
    // =========================================================================
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

    // =========================================================================
    // DELETE /api/admin/quizzes/{id}
    // Hapus kuis beserta semua soal dan attempt-nya (via cascade di DB).
    // =========================================================================
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
