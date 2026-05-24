<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pemrograman Dasar',
            'Basis Data',
            'Elektronika Digital',
            'Jaringan Komputer',
            'Desain Grafis Vokasional',
            'Instalasi Listrik',
            'Sistem Tertanam (Embedded)',
            'Mikrokontroler'
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat)
            ]);
        }
    }
}
