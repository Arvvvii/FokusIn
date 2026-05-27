<?php

namespace App\Http\Controllers;

use App\Models\QuizSet;
use App\Models\QuizQuestion;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Return daftar quiz_sets.
     */
    public function index()
    {
        $quizzes = QuizSet::with('category')->latest()->paginate(10);
        return response()->json($quizzes);
    }

    /**
     * Return detail kuis dan soal-soalnya (correct_answer dan explanation DISEMBUNYIKAN).
     */
    public function show($id)
    {
        $quiz = QuizSet::with('category')->findOrFail($id);

        // Ambil soal-soalnya dan sembunyikan correct_answer serta explanation agar tidak bisa dicurangi
        $questions = $quiz->questions()->get()->makeHidden(['correct_answer', 'explanation']);

        // Set kembali relasi ke dalam model
        $quiz->setRelation('questions', $questions);

        return response()->json($quiz);
    }

    /**
     * Hitung skor berdasarkan jawaban yang dikirim user, cocokkan dengan correct_answer,
     * lalu simpan hasilnya ke tabel quiz_attempts.
     */
    public function attempt(Request $request, $id)
    {
        $request->validate([
            'answers' => 'required|array', // Format: ["1" => "A", "2" => "B"] dengan key id soal dan value pilihan
        ]);

        $quizSet = QuizSet::findOrFail($id);
        $questions = $quizSet->questions;
        $totalQuestions = $questions->count();

        if ($totalQuestions === 0) {
            return response()->json(['message' => 'Kuis ini belum memiliki soal untuk dijawab.'], 400);
        }

        $correctCount = 0;
        $submittedAnswers = $request->input('answers');

        // Lakukan pencocokan jawaban
        foreach ($questions as $question) {
            $userAnswer = $submittedAnswers[$question->id] ?? null;
            $correctAnswer = $question->correct_answer;

            if (!is_null($userAnswer) && strtolower(trim($userAnswer)) === strtolower(trim($correctAnswer))) {
                $correctCount++;
            }
        }

        // Kalkulasi nilai (skala 0 - 100)
        $score = (int) round(($correctCount / $totalQuestions) * 100);

        // Simpan hasil ke tabel quiz_attempts
        $attempt = QuizAttempt::create([
            'user_id' => auth()->id(),
            'quiz_set_id' => $quizSet->id,
            'score' => $score,
        ]);

        return response()->json([
            'message' => 'Ujian kuis selesai dikerjakan.',
            'attempt' => $attempt,
            'correct_answers_count' => $correctCount,
            'total_questions' => $totalQuestions,
            'score' => $score,
        ], 201);
    }
}
