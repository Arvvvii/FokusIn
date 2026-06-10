<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    /**
     * GET /api/leaderboard
     * Kembalikan daftar user dengan role 'student' diurutkan berdasarkan
     * reputation_score tertinggi ke terendah (limit 10 atau paginasi).
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);

            // Batasi per_page antara 5 - 50 untuk keamanan
            $perPage = max(5, min(50, (int) $perPage));

            $leaderboard = User::select([
                    'id',
                    'name',
                    'email',
                    'role',
                    'reputation_score',
                    'avatar_url',
                ])
                ->where('role', 'student')
                ->orderBy('reputation_score', 'desc')
                ->paginate($perPage);

            // Tambahkan rank (peringkat) pada setiap item
            $rank = ($leaderboard->currentPage() - 1) * $leaderboard->perPage() + 1;
            $leaderboard->getCollection()->transform(function ($user) use (&$rank) {
                $user->rank = $rank++;
                return $user;
            });

            return response()->json($leaderboard);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
