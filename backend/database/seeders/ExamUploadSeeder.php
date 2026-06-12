<?php

namespace Database\Seeders;

use App\Models\ExamUpload;
use App\Models\User;
use App\Models\Category;
use App\Models\QuizSet;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class ExamUploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        if ($users->isEmpty() || $categories->isEmpty()) {
            return;
        }

        // Cari kuis yang dibuat di QuizSeeder untuk di-link ke exam_uploads
        $quizzes = QuizSet::with('questions')->get();

        $dummyData = [
            [
                'title' => 'UTS Pemrograman Dasar 2026',
                'text' => "SOAL UJIAN TENGAH SEMESTER (UTS) - PEMROGRAMAN DASAR. \n1. Jelaskan perbedaan tipe data primitif dan tipe data referensi di Java dan berikan contohnya.\n2. Tuliskan algoritma dan flowchart untuk menghitung bilangan prima dari 1 sampai 100.\n3. Apa fungsi dari percabangan switch-case dibanding if-else dalam hal efisiensi waktu eksekusi kompiler?\n4. Jelaskan apa yang dimaksud dengan rekursi dan buat kode fungsi fibonacci rekursif menggunakan bahasa C.\n5. Buat program sederhana untuk mencetak deret aritmatika dengan beda 3 sebanyak n bilangan.",
                'slug' => 'pemrograman-dasar',
                'analysis' => [
                    'message' => 'Analisis pola soal ujian selesai.',
                    'detailed_summary' => "Materi ini membahas konsep pemrograman terstruktur di Java dan C, berfokus pada tipe data primitif, struktur kontrol alur (switch-case), algoritma bilangan prima, dan rekursi matematika.",
                    'topics' => [
                        ['name' => 'Tipe Data & Variabel', 'frequency' => 'Tinggi', 'description' => 'Perbedaan tipe data primitif (int, double) dan tipe objek (String).'],
                        ['name' => 'Fungsi Rekursif', 'frequency' => 'Tinggi', 'description' => 'Konsep memori stack pada fungsi rekursif fibonacci.'],
                        ['name' => 'Struktur Kontrol', 'frequency' => 'Sedang', 'description' => 'Efisiensi switch-case dibanding percabangan bertingkat.']
                    ],
                    'difficulty_distribution' => ['easy' => '20%', 'medium' => '50%', 'hard' => '30%'],
                    'frequent_keywords' => ['Tipe Data', 'Rekursif', 'Looping', 'Flowchart', 'Switch-Case'],
                    'recommendations' => [
                        'Pahami alokasi memori stack pada eksekusi rekursif.',
                        'Latih logika perulangan bersarang untuk mencetak deret bilangan.'
                    ]
                ]
            ],
            [
                'title' => 'UAS Basis Data Relasional 2026',
                'text' => "SOAL UJIAN AKHIR SEMESTER (UAS) - BASIS DATA. \n1. Jelaskan konsep normalisasi basis data dari bentuk 1NF, 2NF, sampai 3NF. Kenapa redundansi harus dihindari?\n2. Tuliskan query SQL untuk menggabungkan (JOIN) tabel Mahasiswa, Krs, dan MataKuliah untuk mengambil nama mahasiswa yang mengambil mata kuliah Basis Data.\n3. Jelaskan perbedaan Primary Key, Foreign Key, dan Unique Key.\n4. Apa yang dimaksud dengan transaksi database dan jelaskan prinsip ACID (Atomicity, Consistency, Isolation, Durability).\n5. Buatlah rancangan Entity Relationship Diagram (ERD) untuk sistem informasi perpustakaan vokasi.",
                'slug' => 'basis-data',
                'analysis' => [
                    'message' => 'Analisis pola soal ujian selesai.',
                    'detailed_summary' => "Analisis materi basis data relasional. Berfokus pada pemodelan data konseptual (ERD), SQL DDL/DML, transaksi ACID, dan teknik normalisasi 1NF-3NF untuk integritas data.",
                    'topics' => [
                        ['name' => 'Normalisasi Basis Data', 'frequency' => 'Tinggi', 'description' => 'Menghilangkan anomali pembaruan dengan 1NF, 2NF, 3NF.'],
                        ['name' => 'Transaksi ACID', 'frequency' => 'Tinggi', 'description' => 'Prinsip ketahanan transaksi perbankan dan perpustakaan.'],
                        ['name' => 'Query Relasional', 'frequency' => 'Sedang', 'description' => 'Penggunaan INNER JOIN dan LEFT JOIN bertingkat.']
                    ],
                    'difficulty_distribution' => ['easy' => '30%', 'medium' => '45%', 'hard' => '25%'],
                    'frequent_keywords' => ['Normalisasi', 'ERD', 'ACID', 'INNER JOIN', 'Primary Key'],
                    'recommendations' => [
                        'Pelajari ketergantungan transitif dan fungsional sepenuhnya.',
                        'Latih pembuatan rancangan database berbasis ERD.'
                    ]
                ]
            ]
        ];

        foreach ($dummyData as $index => $data) {
            $category = Category::where('slug', $data['slug'])->first() ?? $categories->get($index % $categories->count());
            $user = $users->random();

            // Link ke kuis yang cocok jika ada, atau buat kuis baru jika tidak ada
            $quiz = $quizzes->first(function ($q) use ($category) {
                return $q->category_id === $category->id;
            });

            $quizId = $quiz ? $quiz->id : null;

            ExamUpload::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => $data['title'],
                'extracted_text' => $data['text'],
                'file_url' => 'https://res.cloudinary.com/dzrbpcano/image/upload/v1716300000/dummy_exam_' . ($index + 1) . '.pdf',
                'cloudinary_public_id' => 'dummy_exam_' . ($index + 1),
                'status' => 'valid',
                'ai_analysis' => $data['analysis'],
                'quiz_set_id' => $quizId,
            ]);
        }
    }
}
