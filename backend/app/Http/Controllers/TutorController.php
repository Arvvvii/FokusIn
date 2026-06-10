<?php

namespace App\Http\Controllers;

use App\Models\TutorReview;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Mengambil detail profil tutor beserta bio dan reviews-nya.
     * PROTECTED — memerlukan auth:sanctum.
     */
    public function show($id)
    {
        $tutor = User::where('role', 'tutor')
            ->with(['tutorProfile', 'tutorReviews.student:id,name,avatar_url'])
            ->withCount('sessionsAsTutor as session_count')
            ->findOrFail($id);

        return response()->json($tutor);
    }

    /**
     * Mengambil seluruh daftar review/ulasan yang diterima oleh tutor yang sedang login.
     * PROTECTED — memerlukan auth:sanctum + role tutor.
     *
     * Endpoint: GET /api/tutor/reviews
     */
    public function reviews(Request $request)
    {
        $user = auth()->user();

        // Pastikan user yang mengakses adalah tutor
        if ($user->role !== 'tutor') {
            return response()->json([
                'message' => 'Endpoint ini hanya dapat diakses oleh tutor.'
            ], 403);
        }

        // Ambil semua review milik tutor ini dengan relasi yang dibutuhkan
        $reviews = TutorReview::where('tutor_id', $user->id)
            ->with([
                'student:id,name,avatar_url',
                'session:id,title,duration_minutes,scheduled_at,status',
            ])
            ->latest()
            ->paginate(15);

        // Hitung statistik rating agregat untuk tutor ini
        $stats = TutorReview::where('tutor_id', $user->id)
            ->selectRaw('COUNT(*) as total_reviews, AVG(rating) as average_rating, SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as five_star_count')
            ->first();

        return response()->json([
            'reviews' => $reviews,
            'stats'   => [
                'total_reviews'   => (int) $stats->total_reviews,
                'average_rating'  => $stats->average_rating ? round((float) $stats->average_rating, 2) : null,
                'five_star_count' => (int) $stats->five_star_count,
            ],
        ]);
    }
}
