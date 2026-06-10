<?php

namespace App\Http\Controllers;

use App\Models\AiSummary;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * GET /api/student/ai-insights
     * Kembalikan data ringkasan belajar AI milik user yang sedang login.
     *
     * Prioritas:
     * 1. Jika ada record AiSummary untuk user ini, kembalikan data tersebut.
     * 2. Jika tidak ada, hitung statistik dari quiz_attempts dan buat insight teks sederhana.
     */
    public function aiInsights()
    {
        $user = auth()->user();

        // Pastikan hanya student yang bisa akses
        if ($user->role !== 'student') {
            return response()->json(['message' => 'Endpoint ini hanya tersedia untuk siswa.'], 403);
        }

        try {
            // --- Coba ambil data AiSummary milik user (berdasarkan kategori yang paling sering dikerjakan) ---
            // Ambil kategori yang paling sering muncul di quiz attempts user ini
            $topCategoryId = QuizAttempt::where('user_id', $user->id)
                ->join('quiz_sets', 'quiz_attempts.quiz_set_id', '=', 'quiz_sets.id')
                ->select('quiz_sets.category_id', DB::raw('COUNT(*) as attempt_count'))
                ->groupBy('quiz_sets.category_id')
                ->orderBy('attempt_count', 'desc')
                ->value('quiz_sets.category_id');

            $aiSummary = null;
            if ($topCategoryId) {
                $aiSummary = AiSummary::where('category_id', $topCategoryId)->latest()->first();
            }

            // --- Hitung statistik quiz attempts untuk insight ---
            $totalAttempts = QuizAttempt::where('user_id', $user->id)->count();
            $avgScore      = QuizAttempt::where('user_id', $user->id)->avg('score');
            $highestScore  = QuizAttempt::where('user_id', $user->id)->max('score');
            $lowestScore   = QuizAttempt::where('user_id', $user->id)->min('score');

            // Hitung skor per minggu terakhir vs minggu sebelumnya untuk trend
            $avgScoreThisWeek = QuizAttempt::where('user_id', $user->id)
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->avg('score');

            $avgScoreLastWeek = QuizAttempt::where('user_id', $user->id)
                ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
                ->avg('score');

            // --- Buat pesan insight teks sederhana ---
            $insightText = $this->generateInsightText(
                $totalAttempts,
                $avgScore,
                $avgScoreThisWeek,
                $avgScoreLastWeek
            );

            return response()->json([
                'user_id'             => $user->id,
                'user_name'           => $user->name,
                'ai_summary'          => $aiSummary,
                'quiz_statistics'     => [
                    'total_attempts'       => $totalAttempts,
                    'average_score'        => $avgScore !== null ? round($avgScore, 1) : null,
                    'highest_score'        => $highestScore,
                    'lowest_score'         => $lowestScore,
                    'avg_score_this_week'  => $avgScoreThisWeek !== null ? round($avgScoreThisWeek, 1) : null,
                    'avg_score_last_week'  => $avgScoreLastWeek !== null ? round($avgScoreLastWeek, 1) : null,
                ],
                'insight_text'        => $insightText,
                'reputation_score'    => $user->reputation_score ?? 0,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Buat pesan insight teks berdasarkan statistik kuis.
     */
    private function generateInsightText(
        int $totalAttempts,
        ?float $avgScore,
        ?float $avgScoreThisWeek,
        ?float $avgScoreLastWeek
    ): string {
        if ($totalAttempts === 0) {
            return '🚀 Selamat datang! Mulai kerjakan kuis pertamamu untuk mendapatkan insight belajar yang personal.';
        }

        $scoreText = $avgScore !== null
            ? 'Rata-rata skor kuismu adalah ' . round($avgScore, 1) . ' poin.'
            : '';

        // Tentukan tren kinerja
        $trendText = '';
        if ($avgScoreThisWeek !== null && $avgScoreLastWeek !== null) {
            $diff = $avgScoreThisWeek - $avgScoreLastWeek;
            if ($diff > 5) {
                $trendText = '📈 Minggu ini performamu meningkat ' . round($diff, 1) . ' poin dibanding minggu lalu. Pertahankan!';
            } elseif ($diff < -5) {
                $trendText = '📉 Performamu turun ' . round(abs($diff), 1) . ' poin minggu ini. Yuk, latihan lebih giat!';
            } else {
                $trendText = '📊 Performamu stabil minggu ini. Terus konsisten!';
            }
        } elseif ($avgScoreThisWeek !== null) {
            $trendText = '✨ Kamu sudah mengerjakan kuis minggu ini. Terus semangat!';
        } else {
            $trendText = '💡 Coba kerjakan kuis minggu ini untuk memantau perkembanganmu!';
        }

        // Rekomendasi berdasarkan skor rata-rata
        $recommendationText = '';
        if ($avgScore !== null) {
            if ($avgScore >= 85) {
                $recommendationText = '🏆 Prestasimu luar biasa! Coba tantang dirimu dengan materi yang lebih sulit.';
            } elseif ($avgScore >= 70) {
                $recommendationText = '💪 Bagus! Fokuskan latihan pada topik yang masih perlu diperkuat.';
            } elseif ($avgScore >= 50) {
                $recommendationText = '📚 Kamu masih bisa berkembang. Ulang materi dasar dan coba kuis lagi.';
            } else {
                $recommendationText = '🌱 Jangan menyerah! Review materi dan tanyakan ke tutor jika ada yang kurang jelas.';
            }
        }

        return implode(' ', array_filter([$scoreText, $trendText, $recommendationText]));
    }
}
