<?php

namespace App\Services;

use App\Models\User;
use App\Models\Badge;
use Illuminate\Support\Str;

class BadgeService
{
    const THRESHOLDS = [
        'pemula' => 0,
        'kontributor' => 50,
        'tutor-terpercaya' => 100,
        'expert' => 500,
    ];

    public static function checkAndAward($userId)
    {
        // Ambil data User beserta relasi badges-nya
        $user = User::with('badges')->findOrFail($userId);

        foreach (self::THRESHOLDS as $slug => $minThreshold) {
            // Cek jika reputation_score user >= nilai minimum threshold
            if ($user->reputation_score >= $minThreshold) {
                
                // Cek apakah user belum memiliki badge tersebut (berdasarkan slug)
                $hasBadge = $user->badges->contains(function ($badge) use ($slug) {
                    return Str::slug($badge->name) === $slug;
                });

                if (!$hasBadge) {
                    // Cari badge di database berdasarkan slug nama
                    $badge = Badge::all()->first(function ($b) use ($slug) {
                        return Str::slug($b->name) === $slug;
                    });

                    // Jika badge belum ada di database, buat secara otomatis agar aman dari DB kosong
                    if (!$badge) {
                        $name = match ($slug) {
                            'pemula' => 'Pemula',
                            'kontributor' => 'Kontributor',
                            'tutor-terpercaya' => 'Tutor Terpercaya',
                            'expert' => 'Expert',
                            default => ucwords(str_replace('-', ' ', $slug))
                        };

                        $badge = Badge::create([
                            'name' => $name,
                            'threshold' => $minThreshold,
                        ]);
                    }

                    // Tambahkan badge ke user via tabel pivot user_badges
                    $user->badges()->attach($badge->id);

                    // Jika user baru saja mendapatkan badge dengan slug 'tutor-terpercaya',
                    // update kolom role pada tabel users menjadi 'tutor'
                    if ($slug === 'tutor-terpercaya') {
                        $user->update(['role' => 'tutor']);
                    }
                }
            }
        }
    }
}
