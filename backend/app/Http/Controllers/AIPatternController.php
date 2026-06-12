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
     * Mengoptimalkan teks postingan forum menggunakan AI (Groq API).
     * Memperbaiki tata bahasa, struktur, dan kejelasan penulisan.
     */
    public function optimizePost(Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:10|max:10000',
            'title'   => 'nullable|string|max:500',
        ]);

        try {
            $content = $request->input('content');
            $title = $request->input('title', '');
            $groqApiKey = env('GROQ_API_KEY');

            if (!$groqApiKey) {
                return response()->json([
                    'message' => 'GROQ_API_KEY tidak dikonfigurasi.'
                ], 503);
            }

            $systemPrompt = 'Anda adalah editor teks akademik. Tugas Anda HANYA menulis ulang teks agar lebih rapi, jelas, dan terstruktur untuk forum diskusi mahasiswa. '
                . 'PERINGATAN KERAS: '
                . '- JANGAN PERNAH menjawab, menjelaskan solusi, atau memberikan jawaban atas pertanyaan dalam teks. '
                . '- JANGAN menambahkan pengetahuan, solusi, atau informasi baru apapun. '
                . '- Anda BUKAN asisten yang menjawab pertanyaan. Anda HANYA editor yang merapikan tulisan. '
                . 'Yang harus Anda lakukan: '
                . '1. Perbaiki tata bahasa, ejaan, dan tanda baca agar lebih formal dan profesional. '
                . '2. Susun ulang kalimat dan paragraf agar alur pertanyaan lebih logis dan mudah dipahami pembaca forum. '
                . '3. Pertahankan semua kode program (code block) PERSIS seperti aslinya tanpa perubahan apapun. '
                . '4. Pertahankan maksud dan inti pertanyaan yang sama. '
                . '5. Gunakan format Markdown jika membantu keterbacaan (misalnya bold, list, code block). '
                . '6. Balas HANYA dengan teks hasil penulisan ulang. Tanpa kata pembuka, tanpa komentar, tanpa penjelasan.';

            $userPrompt = "Tulis ulang teks forum berikut agar lebih rapi dan terstruktur. JANGAN jawab pertanyaannya, HANYA rapikan penulisannya:\n\n{$content}";

            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'Authorization' => 'Bearer ' . $groqApiKey,
                'Content-Type' => 'application/json',
            ])->timeout(60)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.1-8b-instant',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                'temperature' => 0.3,
                'max_tokens' => 4000,
            ]);

            if ($response->successful()) {
                $optimizedContent = $response->json('choices.0.message.content', '');

                if (trim($optimizedContent) === '') {
                    return response()->json([
                        'message' => 'AI tidak dapat mengoptimalkan teks. Silakan coba lagi.'
                    ], 422);
                }

                return response()->json([
                    'optimized_content' => trim($optimizedContent),
                    'message' => 'Teks berhasil dioptimalkan oleh AI.'
                ]);
            }

            \Log::error('Groq API Optimize Error', ['body' => $response->body()]);
            return response()->json([
                'message' => 'Gagal terhubung ke layanan AI. Silakan coba lagi nanti.'
            ], 500);

        } catch (\Exception $e) {
            \Log::error('AI Optimize Post Error', ['exception' => $e->getMessage(), 'user_id' => auth()->id()]);
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengoptimalkan teks.',
                'error' => $e->getMessage()
            ], 500);
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
                'model' => 'llama-3.1-8b-instant',
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
                $content = $response->json('choices.0.message.content', '');
                
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
