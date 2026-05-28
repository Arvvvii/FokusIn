<?php

namespace App\Http\Controllers;

use App\Services\AIPatternService;
use App\Models\AiSummary;
use Illuminate\Http\Request;

class AIPatternController extends Controller
{
    protected $aiPatternService;

    /**
     * Inject AIPatternService ke Controller.
     */
    public function __construct(AIPatternService $aiPatternService)
    {
        $this->aiPatternService = $aiPatternService;
    }

    /**
     * Validasi category_id dan panggil AIPatternService->getSummary().
     */
    public function summary(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $summary = $this->aiPatternService->getSummary($request->category_id);
            return response()->json($summary);
        } catch (\Exception $e) {
            \Log::error('AI Pattern Error', ['exception' => $e->getMessage(), 'user_id' => auth()->id()]);
            return response()->json([
                'message' => 'Layanan AI sedang tidak tersedia. Coba lagi nanti.'
            ], 503);
        }
    }

    /**
     * Khusus admin: Hapus record di ai_summaries lalu panggil service lagi untuk regenerasi.
     */
    public function refresh(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();

        // Validasi hak akses khusus admin
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Hanya administrator yang dapat melakukan refresh paksa analisis AI.'], 403);
        }

        try {
            // Hapus cache summary lama
            AiSummary::where('category_id', $request->category_id)->delete();

            // Minta service melakukan generate ulang secara langsung
            $newSummary = $this->aiPatternService->getSummary($request->category_id);

            return response()->json([
                'message' => 'Analisis AI berhasil diperbarui secara instan.',
                'data' => $newSummary
            ]);
        } catch (\Exception $e) {
            \Log::error('AI Pattern Refresh Error', ['exception' => $e->getMessage(), 'user_id' => auth()->id()]);
            return response()->json([
                'message' => 'Layanan AI sedang tidak tersedia. Coba lagi nanti.'
            ], 503);
        }
    }
}
