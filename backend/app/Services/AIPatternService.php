<?php

namespace App\Services;

use App\Models\ExamUpload;
use App\Models\AiSummary;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class AIPatternService
{
    /**
     * Mengambil summary AI berdasarkan kategory. 
     * Menggunakan cache tabel ai_summaries jika ada dan valid (< 7 hari).
     */
    public function getSummary($categoryId)
    {
        // 1. Cek tabel ai_summaries apakah ada cache yang valid (< 7 hari)
        $summary = AiSummary::where('category_id', $categoryId)->first();

        if ($summary && $summary->last_generated) {
            $lastGenerated = Carbon::parse($summary->last_generated);
            if ($lastGenerated->addDays(7)->isFuture()) {
                return $summary->summary_json;
            }
        }

        // 2. Jika tidak ada cache yang valid, ambil maksimal 50 extracted_text dari exam_uploads
        $uploadsText = ExamUpload::where('category_id', $categoryId)
            ->whereNotNull('extracted_text')
            ->where('extracted_text', '!=', '')
            ->latest()
            ->limit(50)
            ->pluck('extracted_text')
            ->toArray();

        // Jika data kosong, kembalikan respon default untuk menghemat kuota API
        if (empty($uploadsText)) {
            $defaultResult = [
                'message' => 'Belum ada dokumen soal ujian terunggah pada kategori ini untuk dianalisis oleh AI.',
                'topics' => [],
                'difficulty_distribution' => [
                    'easy' => '0%',
                    'medium' => '0%',
                    'hard' => '0%'
                ],
                'frequent_keywords' => [],
                'recommendations' => [
                    'Silakan unggah berkas soal ujian (PDF/Gambar) terlebih dahulu pada kategori ini.'
                ]
            ];

            // Simpan cache default
            AiSummary::updateOrCreate(
                ['category_id' => $categoryId],
                [
                    'summary_json' => $defaultResult,
                    'last_generated' => now(),
                ]
            );

            return $defaultResult;
        }

        // Gabungkan seluruh teks untuk dianalisis
        $mergedText = implode("\n---\n", $uploadsText);

        // Buat prompt terperinci
        $prompt = "Berikut adalah data potongan teks (OCR/ekstraksi) dari dokumen soal ujian untuk kategori ID {$categoryId}:\n\n"
            . $mergedText . "\n\n"
            . "Lakukan analisis menyeluruh terhadap data teks di atas. Anda harus mengembalikan respons berformat JSON yang berisi:\n"
            . "1. 'message': Ringkasan singkat hasil analisis.\n"
            . "2. 'topics': Array objek topik utama yang paling sering muncul. Masing-masing objek harus memiliki: 'name' (nama topik), 'frequency' ('Tinggi', 'Sedang', atau 'Rendah'), dan 'description' (penjelasan singkat sub-topik/konsep yang diuji).\n"
            . "3. 'difficulty_distribution': Objek distribusi persentase tingkat kesulitan dengan key: 'easy', 'medium', dan 'hard'.\n"
            . "4. 'frequent_keywords': Array kata kunci penting yang paling sering keluar.\n"
            . "5. 'recommendations': Array rekomendasi belajar terarah bagi pelajar.\n\n"
            . "Format JSON wajib persis seperti berikut:\n"
            . "{\n"
            . "  \"message\": \"Analisis pola soal ujian selesai.\",\n"
            . "  \"topics\": [\n"
            . "    {\"name\": \"Nama Topik\", \"frequency\": \"Tinggi\", \"description\": \"Keterangan topik\"}\n"
            . "  ],\n"
            . "  \"difficulty_distribution\": {\"easy\": \"30%\", \"medium\": \"50%\", \"hard\": \"20%\"},\n"
            . "  \"frequent_keywords\": [\"keyword1\", \"keyword2\"],\n"
            . "  \"recommendations\": [\"rekomendasi1\", \"rekomendasi2\"]\n"
            . "}";

        // 3. Panggil API Groq menggunakan model llama3-70b-8192
        $apiKey = env('GROQ_API_KEY');

        if (!$apiKey) {
            throw new \Exception('GROQ_API_KEY tidak dikonfigurasi di file .env');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama3-70b-8192',
            'messages' => [
                [
                    'role' => 'system', 
                    'content' => 'You are an elite educational AI assistant specialized in analyzing exam materials. You MUST return your answer as a JSON object matching the requested schema.'
                ],
                [
                    'role' => 'user', 
                    'content' => $prompt
                ]
            ],
            'response_format' => ['type' => 'json_object'],
            'temperature' => 0.2,
        ]);

        if (!$response->successful()) {
            throw new \Exception('Groq API Error: ' . $response->body());
        }

        // Ambil JSON hasil kembalian dari response
        $content = $response->json('choices.0.message.content');
        $resultJson = json_decode($content, true);

        // Jika JSON invalid, gunakan fallback
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($resultJson)) {
            throw new \Exception('Groq API mengembalikan format JSON yang tidak valid: ' . $content);
        }

        // 4. Simpan hasil kembalian ke ai_summaries dengan masa kedaluwarsa 7 hari (dihitung dari last_generated)
        AiSummary::updateOrCreate(
            ['category_id' => $categoryId],
            [
                'summary_json' => $resultJson,
                'last_generated' => now(),
            ]
        );

        return $resultJson;
    }
}
