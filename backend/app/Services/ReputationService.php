<?php

namespace App\Services;

use App\Models\User;

class ReputationService
{
    public static function add($userId, $points)
    {
        // Increment kolom reputation_score milik User sebesar $points
        $user = User::findOrFail($userId);
        $user->increment('reputation_score', $points);

        // Panggil BadgeService::checkAndAward($userId)
        BadgeService::checkAndAward($userId);
    }

    public static function deduct($userId, $points)
    {
        // Decrement kolom reputation_score milik User sebesar $points
        $user = User::findOrFail($userId);
        
        // Pastikan skor tidak menjadi negatif
        $newScore = max(0, $user->reputation_score - $points);
        $user->update(['reputation_score' => $newScore]);
    }
}
