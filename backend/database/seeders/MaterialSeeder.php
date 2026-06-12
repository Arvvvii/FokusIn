<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Category;
use App\Models\User;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gunakan user tutor atau admin (atau user pertama) sebagai pembuat
        $user = User::where('email', 'tutor@fokusin.com')->first() ?? User::first();
        
        if (!$user) {
            return; // Jika belum ada user, skip
        }

        $materialsData = [
            'fisika-dasar' => [
                'Rotasi Benda Tegar - Konsep & Rumus Utama',
                'Hukum Newton I, II, dan III Dalam Kehidupan Nyata',
                'Termodinamika: Hukum Kekekalan Energi Sistem'
            ],
            'matematika-kalkulus' => [
                'Integral Lipat Dua pada Koordinat Kartesius',
                'Turunan Parsial dan Penerapan Optimasi',
                'Limit Fungsi Aljabar Menuju Tak Hingga'
            ],
            'pemrograman' => [
                'Algoritma & Struktur Data: Array vs Linked List',
                'Pemrograman Berorientasi Objek (OOP) Dasar',
                'Dasar Basis Data Relasional & Normalisasi ERD'
            ],
        ];

        foreach ($materialsData as $categorySlug => $titles) {
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                foreach ($titles as $title) {
                    Material::create([
                        'user_id' => $user->id,
                        'category_id' => $category->id,
                        'title' => $title,
                        'file_url' => 'https://example.com/materials/' . \Illuminate\Support\Str::slug($title) . '.pdf',
                    ]);
                }
            }
        }
    }
}
