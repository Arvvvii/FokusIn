<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Badge::create([
            'name' => 'Pemula',
            'threshold' => 0
        ]);

        Badge::create([
            'name' => 'Kontributor',
            'threshold' => 50
        ]);

        Badge::create([
            'name' => 'Tutor Terpercaya',
            'threshold' => 100
        ]);

        Badge::create([
            'name' => 'Expert',
            'threshold' => 500
        ]);
    }
}
