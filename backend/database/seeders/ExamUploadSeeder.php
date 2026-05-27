<?php

namespace Database\Seeders;

use App\Models\ExamUpload;
use App\Models\User;
use App\Models\Category;
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

        $dummyTexts = [
            "SOAL UJIAN TENGAH SEMESTER (UTS) - PEMROGRAMAN DASAR. \n1. Jelaskan perbedaan tipe data primitif dan tipe data referensi di Java dan berikan contohnya.\n2. Tuliskan algoritma dan flowchart untuk menghitung bilangan prima dari 1 sampai 100.\n3. Apa fungsi dari percabangan switch-case dibanding if-else dalam hal efisiensi waktu eksekusi kompiler?\n4. Jelaskan apa yang dimaksud dengan rekursi dan buat kode fungsi fibonacci rekursif menggunakan bahasa C.\n5. Buat program sederhana untuk mencetak deret aritmatika dengan beda 3 sebanyak n bilangan.",
            "SOAL UJIAN AKHIR SEMESTER (UAS) - BASIS DATA. \n1. Jelaskan konsep normalisasi basis data dari bentuk 1NF, 2NF, sampai 3NF. Kenapa redundansi harus dihindari?\n2. Tuliskan query SQL untuk menggabungkan (JOIN) tabel Mahasiswa, Krs, dan MataKuliah untuk mengambil nama mahasiswa yang mengambil mata kuliah Basis Data.\n3. Jelaskan perbedaan Primary Key, Foreign Key, dan Unique Key.\n4. Apa yang dimaksud dengan transaksi database dan jelaskan prinsip ACID (Atomicity, Consistency, Isolation, Durability).\n5. Buatlah rancangan Entity Relationship Diagram (ERD) untuk sistem informasi perpustakaan vokasi.",
            "UJIAN HARIAN - ELEKTRONIKA DIGITAL. \n1. Konversikan bilangan biner 1101011 menjadi bilangan desimal dan heksadesimal.\n2. Sederhanakan fungsi logika F = A'B'C + A'BC + AB'C + ABC menggunakan aljabar Boolean dan K-Map.\n3. Jelaskan prinsip kerja dari Flip-Flop JK dan Flip-Flop D serta gambarkan tabel kebenarannya.\n4. Apa perbedaan sirkuit kombinasional dengan sirkuit sekuensial pada arsitektur komputer digital?\n5. Rancanglah sirkuit Half Adder menggunakan gerbang logika dasar NAND dan NOR.",
            "SOAL UTS - JARINGAN KOMPUTER. \n1. Jelaskan fungsi dari masing-masing 7 layer pada referensi model OSI beserta protokolnya.\n2. Lakukan subnetting untuk alamat IP 192.168.10.0/26. Tentukan Network ID, Broadcast ID, dan Range IP Host yang valid.\n3. Jelaskan cara kerja protokol TCP dibanding UDP dalam hal keandalan pengiriman paket data (Three-Way Handshake).\n4. Apa kegunaan dari protokol DHCP dan DNS pada jaringan lokal kampus?\n5. Sebutkan perbedaan topologi star, mesh, dan ring serta jelaskan kelebihan masing-masing.",
            "SOAL UJIAN HARIAN - SISTEM TERTANAM & MIKROKONTROLER. \n1. Jelaskan perbedaan mikrokontroler dengan mikroprosesor secara arsitektur hardware.\n2. Buatlah kode program Arduino sederhana untuk melakukan pembacaan sensor suhu analog LM35 lalu menampilkan datanya ke serial monitor.\n3. Apa kegunaan pin PWM (Pulse Width Modulation) pada mikrokontroler ATmega328p?\n4. Jelaskan perbedaan komunikasi serial I2C, SPI, dan UART beserta kelebihan dan kekurangannya.\n5. Rancang sistem kendali aktuator relay lampu otomatis menggunakan mikrokontroler sensor LDR."
        ];

        foreach ($dummyTexts as $index => $text) {
            // Pemetaan dinamis ke kategori agar menyebar
            $category = $categories->get($index % $categories->count());
            $user = $users->random();

            ExamUpload::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'extracted_text' => $text,
                'file_url' => 'https://res.cloudinary.com/dzrbpcano/image/upload/v1716300000/dummy_exam_' . ($index + 1) . '.pdf',
                'cloudinary_public_id' => 'dummy_exam_' . ($index + 1)
            ]);
        }
    }
}
