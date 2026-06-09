<?php

namespace App\Http\Controllers;

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
}
