<?php

namespace Database\Seeders;

use App\Models\QuizSet;
use App\Models\QuizQuestion;
use App\Models\Category;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        // Set 1: Kuis Pemrograman Dasar
        $catPemrograman = Category::where('slug', 'pemrograman-dasar')->first() ?? $categories->first();
        $quiz1 = QuizSet::create([
            'category_id' => $catPemrograman->id,
            'title' => 'Evaluasi Pemrograman Dasar & Struktur Data'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz1->id,
            'content' => 'Manakah di bawah ini yang merupakan tipe data primitif di Java?',
            'options' => ['A' => 'String', 'B' => 'Integer', 'C' => 'int', 'D' => 'ArrayList'],
            'correct_answer' => 'C',
            'explanation' => 'Tipe data primitif di Java ditulis dengan huruf kecil seperti int, double, float, char. Sedangkan String dan Integer adalah tipe data objek/referensi.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz1->id,
            'content' => 'Fungsi rekursif adalah konsep pemrograman di mana fungsi...',
            'options' => ['A' => 'Memanggil fungsi eksternal', 'B' => 'Memanggil dirinya sendiri', 'C' => 'Memiliki parameter bertipe objek', 'D' => 'Tidak mengembalikan nilai balik'],
            'correct_answer' => 'B',
            'explanation' => 'Fungsi rekursif adalah konsep pemrograman di mana fungsi memanggil dirinya sendiri sampai mencapai kondisi batas (base case).'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz1->id,
            'content' => 'Struktur data LIFO (Last In First Out) diimplementasikan pada...',
            'options' => ['A' => 'Queue', 'B' => 'Stack', 'C' => 'Graph', 'D' => 'Tree'],
            'correct_answer' => 'B',
            'explanation' => 'Stack (Tumpukan) menggunakan prinsip LIFO, sedangkan Queue (Antrean) menggunakan prinsip FIFO (First In First Out).'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz1->id,
            'content' => 'Keyword manakah yang digunakan untuk menghentikan perulangan (loop) secara paksa di bahasa C/C++?',
            'options' => ['A' => 'continue', 'B' => 'exit', 'C' => 'break', 'D' => 'stop'],
            'correct_answer' => 'C',
            'explanation' => 'Keyword break digunakan untuk menghentikan iterasi/loop saat itu juga dan keluar dari blok perulangan.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz1->id,
            'content' => 'Indeks pertama pada struktur data Array di sebagian besar bahasa pemrograman dimulai dari angka...',
            'options' => ['A' => '-1', 'B' => '1', 'C' => '0', 'D' => 'Tergantung compiler'],
            'correct_answer' => 'C',
            'explanation' => 'Di sebagian besar bahasa pemrograman modern (seperti C, C++, Java, JavaScript, Python), indeks pertama array adalah 0 (zero-indexed).'
        ]);

        // Set 2: Kuis Basis Data
        $catDb = Category::where('slug', 'basis-data')->first() ?? $categories->get(min(1, $categories->count() - 1));
        $quiz2 = QuizSet::create([
            'category_id' => $catDb->id,
            'title' => 'Evaluasi Desain & Normalisasi Basis Data Relasional'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz2->id,
            'content' => 'Perintah DDL (Data Definition Language) yang digunakan untuk menghapus tabel beserta strukturnya di database adalah...',
            'options' => ['A' => 'DELETE TABLE', 'B' => 'TRUNCATE TABLE', 'C' => 'DROP TABLE', 'D' => 'REMOVE TABLE'],
            'correct_answer' => 'C',
            'explanation' => 'DROP TABLE menghapus tabel beserta skema strukturnya. TRUNCATE menghapus seluruh baris data tetapi menyisakan strukturnya. DELETE digunakan untuk menghapus baris tertentu.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz2->id,
            'content' => 'Normalisasi bentuk kedua (2NF) mensyaratkan tidak boleh ada ketergantungan parsial, yang artinya...',
            'options' => [
                'A' => 'Semua atribut non-key harus bergantung penuh pada primary key', 
                'B' => 'Semua atribut harus bernilai tunggal (atomic)', 
                'C' => 'Tidak boleh ada atribut transitif', 
                'D' => 'Semua kolom bertipe varchar'
            ],
            'correct_answer' => 'A',
            'explanation' => 'Bentuk 2NF mengharuskan tabel sudah dalam bentuk 1NF dan seluruh atribut bukan kunci harus bergantung sepenuhnya (fully functionally dependent) pada primary key utama.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz2->id,
            'content' => 'Hubungan relasi di mana satu baris di tabel A terhubung ke banyak baris di tabel B disebut...',
            'options' => ['A' => 'One to One', 'B' => 'One to Many', 'C' => 'Many to Many', 'D' => 'Self Relation'],
            'correct_answer' => 'B',
            'explanation' => 'Relasi ini dinamakan One to Many (1 ke Banyak), contohnya satu Kategori memiliki banyak Kiriman Post.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz2->id,
            'content' => 'Karakter wildcard pada query SQL LIKE untuk mencocokkan pola string sepanjang nol atau lebih karakter adalah...',
            'options' => ['A' => '_', 'B' => '?', 'C' => '%', 'D' => '*'],
            'correct_answer' => 'C',
            'explanation' => 'Wildcard persen (%) mewakili string dengan panjang acak, sedangkan underscore (_) digunakan untuk mewakili tepat satu karakter saja.'
        ]);

        QuizQuestion::create([
            'quiz_set_id' => $quiz2->id,
            'content' => 'Manakah di bawah ini DBMS yang berbasis NoSQL (bukan relasional)?',
            'options' => ['A' => 'MySQL', 'B' => 'PostgreSQL', 'C' => 'MongoDB', 'D' => 'Oracle Database'],
            'correct_answer' => 'C',
            'explanation' => 'MongoDB adalah DBMS NoSQL berorientasi dokumen (document store) yang menggunakan skema JSON-like. MySQL, PostgreSQL, dan Oracle adalah RDBMS (Relasional).'
        ]);
    }
}
