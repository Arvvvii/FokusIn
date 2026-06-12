<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Subscribe a new email to the newsletter.
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Check if already subscribed to return a friendly response instead of 422 validation error
        $existing = NewsletterSubscriber::where('email', $validated['email'])->first();
        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Email ini sudah terdaftar untuk berlangganan.',
            ], 400);
        }

        $subscriber = NewsletterSubscriber::create([
            'email' => $validated['email'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih! Anda berhasil berlangganan newsletter kami.',
            'data' => $subscriber
        ], 201);
    }
}
