<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            BadgeSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            ExamUploadSeeder::class,
            MaterialSeeder::class,
            QuizSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
