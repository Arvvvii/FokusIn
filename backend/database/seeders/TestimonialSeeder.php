<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use App\Models\User;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mengambil user demo yang sukses dibuat oleh UserSeeder
        $siswa = User::where('email', 'siswa@fokusin.com')->first();
        $tutor = User::where('email', 'tutor@fokusin.com')->first();
        $admin = User::where('email', 'admin@fokusin.com')->first();

        // Fallback aman jika user tidak ditemukan
        $defaultUser = User::first();
        $userIdSiswa = $siswa ? $siswa->id : ($defaultUser ? $defaultUser->id : 1);
        $userIdTutor = $tutor ? $tutor->id : ($defaultUser ? $defaultUser->id : 1);
        $userIdAdmin = $admin ? $admin->id : ($defaultUser ? $defaultUser->id : 1);

        $testimonials = [
            [
                'user_id'     => $userIdSiswa,
                'content'     => 'AI Analyzer sangat membantu saya mengurai jurnal-jurnal ilmiah yang kompleks menjadi bahasa yang lebih mudah dicerna. Sangat menghemat waktu riset saya!',
                'rating'      => 5,
                'is_featured' => true,
            ],
            [
                'user_id'     => $userIdTutor,
                'content'     => 'Fitur mentoring sangat berguna saat saya stuck di materi Kalkulus. Mentornya solutif dan sabar. Platform ini benar-benar ekosistem belajar yang lengkap.',
                'rating'      => 5,
                'is_featured' => true,
            ],
            [
                'user_id'     => $userIdAdmin,
                'content'     => 'Quiz cerdasnya membantu saya mengulang materi sebelum ujian. Saya tidak perlu membuat flashcard manual lagi karena AI sudah membuatnya untuk saya.',
                'rating'      => 5,
                'is_featured' => true,
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}