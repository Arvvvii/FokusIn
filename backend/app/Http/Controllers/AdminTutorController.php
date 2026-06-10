<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTutorController extends Controller
{
    /**
     * Helper: pastikan request datang dari admin.
     */
    private function authorizeAdmin(): ?\Illuminate\Http\JsonResponse
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak. Hanya admin yang diizinkan.'], 403);
        }
        return null;
    }

    // =========================================================================
    // GET /api/admin/tutors
    // List semua user dengan role 'tutor' + jumlah sesi mentoring mereka.
    // =========================================================================
    public function index(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $tutors = User::where('role', 'tutor')
                ->with('tutorProfile')
                ->withCount([
                    'sessionsAsTutor as total_sessions',
                    'sessionsAsTutor as completed_sessions' => function ($q) {
                        $q->where('status', 'completed');
                    },
                ])
                ->when($request->search, fn ($q, $s) =>
                    $q->where('name', 'like', "%{$s}%")
                      ->orWhere('email', 'like', "%{$s}%")
                )
                ->latest()
                ->paginate(15);

            return response()->json($tutors);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil data tutor.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // GET /api/admin/tutors/{id}
    // Detail satu tutor: load relasi profil, review, dan sesi mentoring.
    // =========================================================================
    public function show($id)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $tutor = User::where('role', 'tutor')
                ->with([
                    'tutorProfile',
                    'tutorReviews' => function ($q) {
                        $q->with('student:id,name,avatar_url')->latest()->limit(10);
                    },
                    'sessionsAsTutor' => function ($q) {
                        $q->with('student:id,name,avatar_url')
                          ->latest()
                          ->limit(20);
                    },
                ])
                ->withCount([
                    'sessionsAsTutor as total_sessions',
                    'sessionsAsTutor as completed_sessions' => function ($q) {
                        $q->where('status', 'completed');
                    },
                    'tutorReviews as total_reviews',
                ])
                ->findOrFail($id);

            // Hitung rata-rata rating dari tutor_reviews secara dinamis
            $avgRating = $tutor->tutorReviews()->avg('rating');

            return response()->json([
                'tutor'          => $tutor,
                'average_rating' => $avgRating !== null ? round($avgRating, 2) : null,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Tutor tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil detail tutor.', 'error' => $e->getMessage()], 500);
        }
    }

    // =========================================================================
    // POST /api/admin/tutors
    // Buat akun tutor baru (hanya admin yang bisa membuat akun tutor langsung).
    // =========================================================================
    public function store(Request $request)
    {
        if ($deny = $this->authorizeAdmin()) return $deny;

        try {
            $validated = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'bio'      => 'nullable|string|max:2000',
            ]);

            // Buat user dengan role tutor
            $tutor = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => 'tutor',
            ]);

            // Sinkronisasi role Spatie Laravel-Permission
            $tutor->assignRole('tutor');

            // Buat tutor_profile kosong sekaligus (opsional tapi dianjurkan)
            $tutor->tutorProfile()->create([
                'bio'          => $validated['bio'] ?? null,
                'rating'       => 0,
                'total_reviews' => 0,
            ]);

            $tutor->load('tutorProfile');

            return response()->json([
                'message' => 'Akun tutor berhasil dibuat.',
                'tutor'   => $tutor,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e; // Biarkan Laravel tangani dan kembalikan 422 otomatis
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat akun tutor.', 'error' => $e->getMessage()], 500);
        }
    }
}
