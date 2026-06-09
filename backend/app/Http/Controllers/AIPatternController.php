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

    /**
     * Menerima upload file arsip ujian, mengekstrak teks, dan mengirimkan ke Groq API.
     */
    public function analyze(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // Maksimal 10MB
        ]);

        try {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $text = '';

            // 1. Ekstraksi Teks Berdasarkan Format File
            if ($extension === 'pdf') {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file->getPathname());
                $text = $pdf->getText();
            } elseif ($extension === 'docx') {
                // Ekstraksi ringan bawaan PHP menggunakan ZipArchive
                $zip = new \ZipArchive();
                if ($zip->open($file->getPathname()) === true) {
                    if (($index = $zip->locateName('word/document.xml')) !== false) {
                        $data = $zip->getFromIndex($index);
                        $zip->close();
                        $text = strip_tags($data);
                    }
                }
            } elseif ($extension === 'doc') {
                // Ekstraksi fallback sederhana untuk .doc (binary format) tanpa external package berat
                $content = file_get_contents($file->getPathname());
                $text = preg_replace('/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/', ' ', $content);
            }

            if (trim($text) === '') {
                return response()->json([
                    'message' => 'Gagal mengekstrak teks dari file atau file kosong.'
                ], 422);
            }

            // Batasi panjang teks agar tidak melebihi limit token Groq
            $text = substr($text, 0, 15000);

            // 2. Persiapan dan Pemanggilan Groq API
            $groqApiKey = env('GROQ_API_KEY'); // Pastikan variable ini ada di .env

            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Bearer ' . $groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(60)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama3-8b-8192',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Anda adalah AI Pattern Analyzer. Tugas Anda adalah menganalisis teks soal ujian dan membalas HANYA dengan JSON murni tanpa format markdown (seperti ```json ... ```). Struktur JSON harus persis seperti ini:
{
  "frekuensi_topik": [
    {"topik": "Nama Topik 1", "persentase": 40},
    {"topik": "Nama Topik 2", "persentase": 60}
  ],
  "tingkat_kesulitan": "Sulit / Sedang / Mudah",
  "rekomendasi_belajar": ["Saran 1", "Saran 2", "Saran 3"],
  "kata_kunci": ["Keyword 1", "Keyword 2"]
}'
                    ],
                    [
                        'role' => 'user',
                        'content' => "Analisis teks soal berikut ini dan kembalikan JSON:\n\n" . $text
                    ]
                ],
                'temperature' => 0.2,
                'response_format' => ['type' => 'json_object'] // Minta Groq membalas dalam format JSON Object
            ]);

            // 3. Menangani Respons dari Groq
            if ($response->successful()) {
                $result = $response->json();
                $content = $result['choices'][0]['message']['content'] ?? '';
                
                // Parse string JSON dari Groq ke dalam array
                $decodedContent = json_decode($content, true);
                
                if (json_last_error() === JSON_ERROR_NONE) {
                    return response()->json($decodedContent);
                } else {
                    return response()->json([
                        'message' => 'Gagal memparsing respons JSON dari AI.',
                        'raw_response' => $content
                    ], 500);
                }
            }

            return response()->json([
                'message' => 'Gagal terhubung ke layanan AI.',
                'error' => $response->body()
            ], 500);

        } catch (\Exception $e) {
            \Log::error('AI Analysis Error', ['exception' => $e->getMessage()]);
            return response()->json([
                'message' => 'Terjadi kesalahan internal saat memproses file atau menganalisis data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
