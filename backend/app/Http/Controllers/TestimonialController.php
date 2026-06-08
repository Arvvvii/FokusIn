<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Mengambil daftar testimoni pilihan untuk Homepage (Public)
     */
    public function getFeatured()
    {
        $testimonials = Testimonial::with(['user' => function ($query) {
            $query->select('id', 'name', 'prodi', 'avatar_url');
        }])
        ->where('is_featured', true)
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data testimoni pilihan.',
            'data' => $testimonials
        ]);
    }

    /**
     * Menyimpan testimoni baru (Protected by Sanctum)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:500',
            'rating'  => 'required|integer|min:1|max:5',
        ]);

        $testimonial = Testimonial::create([
            'user_id'     => auth()->id(),
            'content'     => $validated['content'],
            'rating'      => $validated['rating'],
            'is_featured' => false, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Testimoni berhasil dikirim dan menunggu persetujuan.',
            'data' => $testimonial
        ], 201);
    }
}
