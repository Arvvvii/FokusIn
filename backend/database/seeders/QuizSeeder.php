<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuizSet;
use App\Models\QuizQuestion;
use App\Models\Category;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes = [
            [
                'category_slug' => 'fisika-dasar',
                'title' => 'Kuis Fisika Dasar: Rotasi & Dinamika',
                'question' => 'Sebuah benda tegar berotasi dengan kecepatan sudut konstan. Jika momen inersia benda diperbesar dua kali lipat dan kecepatan sudut tetap, apa yang terjadi pada energi kinetik rotasinya?',
                'options' => json_encode(['Tetap', 'Menjadi setengahnya', 'Menjadi dua kali lipat', 'Menjadi empat kali lipat']),
                'correct_answer' => 'Menjadi dua kali lipat'
            ],
            [
                'category_slug' => 'matematika-kalkulus',
                'title' => 'Kuis Kalkulus: Integral & Turunan',
                'question' => 'Berapakah turunan pertama dari fungsi f(x) = 3x^2 + 5x - 2?',
                'options' => json_encode(['6x + 5', '3x + 5', '6x - 2', '3x^2 + 5']),
                'correct_answer' => '6x + 5'
            ],
            [
                'category_slug' => 'pemrograman',
                'title' => 'Kuis Pemrograman: Struktur Data Dasar',
                'question' => 'Manakah struktur data yang menggunakan prinsip Last In First Out (LIFO)?',
                'options' => json_encode(['Queue', 'Stack', 'Linked List', 'Array']),
                'correct_answer' => 'Stack'
            ]
        ];

        foreach ($quizzes as $quizData) {
            $category = Category::where('slug', $quizData['category_slug'])->first();

            if ($category) {
                // Buat Quiz Set
                $quizSet = QuizSet::create([
                    'category_id' => $category->id,
                    'title' => $quizData['title'],
                ]);

                // Buat Quiz Question
                // Catatan: Menggunakan 'content' atau 'question' tergantung skema database. 
                // Di sini diasumsikan menggunakan 'content' (berdasarkan file migrasi) atau 'question' (berdasarkan instruksi).
                // Jika database menggunakan 'content':
                QuizQuestion::create([
                    'quiz_set_id' => $quizSet->id,
                    // Karena instruksi menyebut kolom 'question', tetapi biasanya Laravel memakai 'content' di migrasi:
                    'content' => $quizData['question'], 
                    'options' => $quizData['options'],
                    'correct_answer' => $quizData['correct_answer']
                ]);
            }
        }
    }
}
