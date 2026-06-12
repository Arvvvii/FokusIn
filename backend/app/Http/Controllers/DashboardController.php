<?php

namespace App\Http\Controllers;

use App\Models\AiSummary;
use App\Models\QuizAttempt;
use App\Models\MentoringSession;
use App\Models\Post;
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
        if ($user->role !== 'pelajar') {
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

            // Calculate real recommendations based on quiz attempts per category
            $attemptsStats = QuizAttempt::where('user_id', $user->id)
                ->join('quiz_sets', 'quiz_attempts.quiz_set_id', '=', 'quiz_sets.id')
                ->join('categories', 'quiz_sets.category_id', '=', 'categories.id')
                ->select('categories.name as category_name', DB::raw('AVG(score) as avg_score'))
                ->groupBy('categories.id', 'categories.name')
                ->get();

            $recommendations = [];
            foreach ($attemptsStats as $stat) {
                $score = round($stat->avg_score);
                $priority = $score < 70 ? 'high' : 'medium';
                $recommendations[] = [
                    'topic' => $stat->category_name,
                    'priority' => $priority,
                    'score' => $score
                ];
            }

            // Sort recommendations so high priority comes first (lowest score first)
            usort($recommendations, function($a, $b) {
                return $a['score'] <=> $b['score'];
            });

            // If no attempts yet, see if there are any uploaded exams / ai summary recommendations
            if (empty($recommendations) && $aiSummary && isset($aiSummary->summary_json['recommendations'])) {
                $aiRecs = $aiSummary->summary_json['recommendations'] ?? [];
                foreach (array_slice($aiRecs, 0, 3) as $rec) {
                    $parts = explode(':', $rec, 2);
                    $topic = trim($parts[0]);
                    $recommendations[] = [
                        'topic' => $topic,
                        'priority' => 'high',
                        'score' => 40
                    ];
                }
            }

            if (empty($recommendations)) {
                // Fallback: active jurusan and semester
                $latestUpload = \App\Models\ExamUpload::where('user_id', $user->id)
                    ->with('category')
                    ->latest()
                    ->first();

                $latestQuizAttempt = QuizAttempt::where('user_id', $user->id)
                    ->with('quizSet.category')
                    ->latest()
                    ->first();

                $jurusan = 'Teknik Informatika';
                $semester = 1;

                if ($latestUpload && $latestUpload->category) {
                    $jurusan = $latestUpload->category->jurusan ?? $jurusan;
                    $semester = $latestUpload->category->semester ?? $semester;
                } elseif ($latestQuizAttempt && $latestQuizAttempt->quizSet && $latestQuizAttempt->quizSet->category) {
                    $jurusan = $latestQuizAttempt->quizSet->category->jurusan ?? $jurusan;
                    $semester = $latestQuizAttempt->quizSet->category->semester ?? $semester;
                }

                $activeCategories = \App\Models\Category::where('jurusan', $jurusan)
                    ->where('semester', $semester)
                    ->take(2)
                    ->get();
                foreach ($activeCategories as $cat) {
                    $recommendations[] = [
                        'topic' => $cat->name,
                        'priority' => 'high',
                        'score' => 35
                    ];
                }
            }

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
                'summary'             => $insightText,
                'confidence_score'    => $totalAttempts > 0 ? (min(100, 75 + $totalAttempts) . '%') : '85%',
                'recommendations'     => $recommendations,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * GET /api/student/dashboard
     * Kembalikan statistik ringkas untuk student dashboard.
     */
    public function studentDashboard()
    {
        $user = auth()->user();

        // Pastikan hanya student yang bisa akses
        if ($user->role !== 'pelajar') {
            return response()->json(['message' => 'Endpoint ini hanya tersedia untuk siswa.'], 403);
        }

        try {
            $totalMentoringSessions = MentoringSession::where('student_id', $user->id)->count();
            $totalForumPosts = Post::where('user_id', $user->id)->count();
            $totalQuizAttempts = QuizAttempt::where('user_id', $user->id)->count();

            // Find active jurusan & semester based on latest activity
            $latestUpload = \App\Models\ExamUpload::where('user_id', $user->id)
                ->with('category')
                ->latest()
                ->first();

            $latestQuizAttempt = QuizAttempt::where('user_id', $user->id)
                ->with('quizSet.category')
                ->latest()
                ->first();

            $jurusan = 'Teknik Informatika';
            $semester = 1;

            if ($latestUpload && $latestUpload->category) {
                $jurusan = $latestUpload->category->jurusan ?? $jurusan;
                $semester = $latestUpload->category->semester ?? $semester;
            } elseif ($latestQuizAttempt && $latestQuizAttempt->quizSet && $latestQuizAttempt->quizSet->category) {
                $jurusan = $latestQuizAttempt->quizSet->category->jurusan ?? $jurusan;
                $semester = $latestQuizAttempt->quizSet->category->semester ?? $semester;
            }

            // Find categories for this major and semester
            $categories = \App\Models\Category::where('jurusan', $jurusan)
                ->where('semester', $semester)
                ->pluck('id');

            // Find quiz sets in these categories
            $totalQuizSets = \App\Models\QuizSet::whereIn('category_id', $categories)->count();

            // Find how many of these quiz sets the user has attempted
            $attemptedQuizSets = QuizAttempt::where('user_id', $user->id)
                ->whereIn('quiz_set_id', function($q) use ($categories) {
                    $q->select('id')->from('quiz_sets')->whereIn('category_id', $categories);
                })
                ->distinct('quiz_set_id')
                ->count('quiz_set_id');

            // Progress percentage
            $progressPercent = $totalQuizSets > 0 ? round(($attemptedQuizSets / $totalQuizSets) * 100) : 0;
            if ($progressPercent === 0) {
                $progressPercent = 15; // default minimum visual progress
            }

            return response()->json([
                'total_mentoring_sessions' => $totalMentoringSessions,
                'total_forum_posts'        => $totalForumPosts,
                'total_quiz_attempts'      => $totalQuizAttempts,
                'jurusan'                  => $jurusan,
                'semester'                 => $semester,
                'progress_percent'         => $progressPercent,
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
