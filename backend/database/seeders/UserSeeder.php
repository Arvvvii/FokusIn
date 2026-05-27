<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin
        $admin = User::create([
            'name' => 'Admin Vokasi',
            'email' => 'admin@fokusin.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'reputation_score' => 600,
        ]);
        $admin->assignRole('admin');
        
        $expertBadge = Badge::where('threshold', 500)->first();
        if ($expertBadge) {
            $admin->badges()->attach($expertBadge->id);
        }

        // 2. Tutor dengan badge terverifikasi (Tutor Terpercaya)
        $tutor = User::create([
            'name' => 'Pak Andi Tutor',
            'email' => 'tutor@fokusin.com',
            'password' => Hash::make('password123'),
            'role' => 'tutor',
            'reputation_score' => 120,
        ]);
        $tutor->assignRole('tutor');
        
        $badgesForTutor = Badge::whereIn('threshold', [0, 50, 100])->get();
        foreach ($badgesForTutor as $badge) {
            $tutor->badges()->attach($badge->id);
        }

        // 3. Pelajar 1 (Reputasi 55, badge Pemula & Kontributor)
        $pelajar1 = User::create([
            'name' => 'Budi Pelajar',
            'email' => 'budi@fokusin.com',
            'password' => Hash::make('password123'),
            'role' => 'pelajar',
            'reputation_score' => 55,
        ]);
        $pelajar1->assignRole('pelajar');
        
        $badgesForP1 = Badge::whereIn('threshold', [0, 50])->get();
        foreach ($badgesForP1 as $badge) {
            $pelajar1->badges()->attach($badge->id);
        }

        // 4. Pelajar 2 (Reputasi 5, badge Pemula)
        $pelajar2 = User::create([
            'name' => 'Siti Pelajar',
            'email' => 'siti@fokusin.com',
            'password' => Hash::make('password123'),
            'role' => 'pelajar',
            'reputation_score' => 5,
        ]);
        $pelajar2->assignRole('pelajar');
        
        $pemulaBadge = Badge::where('threshold', 0)->first();
        if ($pemulaBadge) {
            $pelajar2->badges()->attach($pemulaBadge->id);
        }

        // 5. Pelajar 3 (Reputasi 0, badge Pemula)
        $pelajar3 = User::create([
            'name' => 'Rian Pelajar',
            'email' => 'rian@fokusin.com',
            'password' => Hash::make('password123'),
            'role' => 'pelajar',
            'reputation_score' => 0,
        ]);
        $pelajar3->assignRole('pelajar');
        
        if ($pemulaBadge) {
            $pelajar3->badges()->attach($pemulaBadge->id);
        }
    }
}
