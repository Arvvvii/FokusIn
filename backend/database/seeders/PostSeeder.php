<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelajars = User::where('role', 'pelajar')->get();
        $tutors = User::whereIn('role', ['tutor', 'admin'])->get();
        $categories = Category::all();

        if ($pelajars->isEmpty() || $tutors->isEmpty() || $categories->isEmpty()) {
            return;
        }

        // Contoh-contoh pertanyaan kustom bertema Vokasi
        $questionsData = [
            'Bagaimana cara instalasi database MySQL di Laragon Windows?',
            'Apa perbedaan antara gerbang logika AND dan NAND secara sirkuit praktis?',
            'Mengapa mikrokontroler Arduino Uno sering mengalami overload memori SRAM?',
            'Bagaimana cara subnetting kelas C IP 192.168.1.0/27?',
            'Apa perbedaan utama tipe data String dan char[] di Pemrograman C?',
            'Bagaimana merancang instalasi listrik 2 fasa untuk laboratorium komputer?',
            'Apa kegunaan kapasitor kopling pada sirkuit elektronika digital?',
            'Bagaimana cara kerja register geser (shift register) pada sistem tertanam?',
            'Mengapa index array selalu dimulai dari angka 0?',
            'Bagaimana cara menghubungkan sensor suhu LM35 ke pin analog Arduino?'
        ];

        // Buat minimal 10 pertanyaan forum
        foreach ($questionsData as $index => $title) {
            $category = $categories->get($index % $categories->count());
            $pelajar = $pelajars->get($index % $pelajars->count());

            $isVerified = ($index % 3 === 0);

            $question = Post::create([
                'user_id' => $pelajar->id,
                'category_id' => $category->id,
                'title' => $title,
                'content' => "Halo teman-teman Vokasi, saya sedang mengerjakan tugas praktikum mengenai topik '{$title}' dan mengalami kebingungan pada dasarnya. Bolehkah dibantu dengan konsep atau contoh implementasi kode/sirkuit sederhananya? Terima kasih banyak!",
                'type' => 'question',
                'is_verified' => $isVerified,
            ]);

            // Tambahkan jawaban untuk beberapa pertanyaan secara logis
            if ($index % 2 === 0) {
                $tutor = $tutors->get($index % $tutors->count());
                
                $isBestAnswer = ($index % 4 === 0);

                Post::create([
                    'user_id' => $tutor->id,
                    'category_id' => $category->id,
                    'title' => "Re: " . $title,
                    'content' => "Halo {$pelajar->name}, untuk menyelesaikan permasalahan '{$title}', langkah praktis pertama yang perlu dilakukan adalah memastikan dependensi modul dan perangkat terhubung dengan benar. Berikutnya, silakan terapkan penyelesaian bertahap ini sesuai dengan modul perkuliahan {$category->name} bab {$index} halaman 45.",
                    'type' => 'answer',
                    'parent_id' => $question->id,
                    'is_verified' => true,
                    'is_best_answer' => $isBestAnswer,
                ]);
            }
        }
    }
}
