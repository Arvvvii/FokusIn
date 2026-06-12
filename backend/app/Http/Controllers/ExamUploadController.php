<?php

namespace App\Http\Controllers;

use App\Models\ExamUpload;
use App\Models\AiSummary;
use App\Models\QuizSet;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExamUploadController extends Controller
{
    /**
     * Return daftar exam_uploads beserta relasi user dan category.
     * Mendukung filter berdasarkan category_id.
     */
    public function index(Request $request)
    {
        $query = ExamUpload::with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category',
            'quizSet'
        ]);

        if ($request->has('category_id') && !is_null($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        $uploads = $query->latest()->get();

        return response()->json($uploads);
    }

    /**
     * Handle upload file ke Cloudinary dan simpan data ke exam_uploads.
     * Mengambil teks dari file, melakukan analisis AI instan per materi,
     * serta membuat QuizSet dan QuizQuestion untuk simulasi kuis.
     */
    public function store(Request $request)
    {
        // Cek Role (Boleh diakses oleh admin, tutor, maupun pelajar)
        if (!in_array(auth()->user()->role, ['admin', 'tutor', 'pelajar'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // 1. Validasi input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|max:10240|mimes:pdf,docx,doc', // Max 10MB
            'extracted_text' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $extractedText = '';

        // 2. Ekstraksi Teks Berdasarkan Format File
        try {
            if ($extension === 'pdf') {
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file->getPathname());
                $extractedText = $pdf->getText();
            } elseif ($extension === 'docx') {
                $zip = new \ZipArchive();
                if ($zip->open($file->getPathname()) === true) {
                    if (($index = $zip->locateName('word/document.xml')) !== false) {
                        $data = $zip->getFromIndex($index);
                        $zip->close();
                        $extractedText = strip_tags($data);
                    }
                }
            } elseif ($extension === 'doc') {
                $content = file_get_contents($file->getPathname());
                $extractedText = preg_replace('/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/', ' ', $content);
            }
        } catch (\Exception $e) {
            Log::error('OCR Extraction error in ExamUploadController: ' . $e->getMessage());
        }

        if (empty(trim($extractedText))) {
            $extractedText = "Hasil ekstraksi otomatis dari dokumen: " . $file->getClientOriginalName();
        }

        // 3. Upload file ke Cloudinary menggunakan cloudinary()->uploadApi()->upload()
        $resourceType = 'raw';
        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $resourceType = 'image';
            $publicId = 'fokusin_' . uniqid();
        } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mov', 'webm'])) {
            $resourceType = 'video';
            $publicId = 'fokusin_' . uniqid();
        } else {
            $resourceType = 'raw';
            $publicId = 'fokusin_' . uniqid() . '.' . strtolower($extension);
        }

        $uploadedFile = cloudinary()->uploadApi()->upload($file->getRealPath(), [
            'resource_type' => $resourceType,
            'public_id' => $publicId,
        ]);
        $fileUrl = $uploadedFile['secure_url'];
        $cloudinaryPublicId = $uploadedFile['public_id'];

        // 4. Analisis AI Soal & Rangkuman menggunakan Groq API
        $groqApiKey = env('GROQ_API_KEY');
        $aiAnalysis = null;

        if ($groqApiKey) {
            try {
                $textExcerpt = substr($extractedText, 0, 12000);

                $prompt = "Berikut adalah materi/teks soal ujian dari dokumen yang diunggah:\n\n"
                    . $textExcerpt . "\n\n"
                    . "Lakukan analisis materi ini dan buatlah:\n"
                    . "1. Ringkasan hasil analisis ('message').\n"
                    . "2. Rangkuman materi belajar secara lengkap, terstruktur, dan mendalam ('detailed_summary').\n"
                    . "3. Topik utama ('topics'): array objek dengan 'name', 'frequency' ('Tinggi'/'Sedang'/'Rendah'), dan 'description'.\n"
                    . "4. Distribusi kesulitan ('difficulty_distribution'): objek dengan key 'easy', 'medium', 'hard'.\n"
                    . "5. Kata kunci penting ('frequent_keywords'): array string.\n"
                    . "6. Rekomendasi belajar ('recommendations'): array string.\n"
                    . "7. 5 soal kuis pilihan ganda ('quiz_questions'): array objek dengan 'content', 'options' (objek dengan key A, B, C, D), 'correct_answer' (A/B/C/D), dan 'explanation'.\n\n"
                    . "Kembalikan respon hanya berupa JSON valid dengan struktur ini:\n"
                    . "{\n"
                    . "  \"message\": \"string\",\n"
                    . "  \"detailed_summary\": \"string\",\n"
                    . "  \"topics\": [{\"name\": \"string\", \"frequency\": \"string\", \"description\": \"string\"}],\n"
                    . "  \"difficulty_distribution\": {\"easy\": \"30%\", \"medium\": \"50%\", \"hard\": \"20%\"},\n"
                    . "  \"frequent_keywords\": [\"string\"],\n"
                    . "  \"recommendations\": [\"string\"],\n"
                    . "  \"quiz_questions\": [\n"
                    . "    {\"content\": \"string\", \"options\": {\"A\": \"string\", \"B\": \"string\", \"C\": \"string\", \"D\": \"string\"}, \"correct_answer\": \"A\", \"explanation\": \"string\"}\n"
                    . "  ]\n"
                    . "}";

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $groqApiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(60)->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.1-8b-instant',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are an educational AI. You MUST return your response as a valid JSON object matching the requested schema.'
                        ],
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'response_format' => ['type' => 'json_object'],
                    'temperature' => 0.2,
                ]);

                if ($response->successful()) {
                    $content = $response->json('choices.0.message.content', '');
                    $decoded = json_decode($content, true);

                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $aiAnalysis = $decoded;
                    }
                }
            } catch (\Exception $e) {
                Log::error('AI Analysis failed during upload: ' . $e->getMessage());
            }
        }

        // Fallback jika Groq gagal atau tidak ada API Key
        if (!$aiAnalysis) {
            $aiAnalysis = [
                'message' => 'Analisis pola soal ujian selesai.',
                'detailed_summary' => "Materi ini membahas topik utama yang ada dalam dokumen yang diunggah. Konsep-konsep penting meliputi pengenalan teori, metodologi penyelesaian masalah, serta implementasi praktis di bidang vokasi.\n\nSangat disarankan bagi mahasiswa untuk membaca modul terkait, melakukan latihan soal secara konsisten, dan berdiskusi aktif di forum.",
                'topics' => [
                    ['name' => 'Pendahuluan & Konsep Dasar', 'frequency' => 'Tinggi', 'description' => 'Teori dasar dan definisi awal materi.'],
                    ['name' => 'Studi Kasus & Implementasi', 'frequency' => 'Sedang', 'description' => 'Penerapan praktis dari konsep yang dipelajari.']
                ],
                'difficulty_distribution' => ['easy' => '30%', 'medium' => '50%', 'hard' => '20%'],
                'frequent_keywords' => ['Konsep Dasar', 'Implementasi', 'Vokasi', 'Latihan Soal'],
                'recommendations' => [
                    'Pahami definisi dan konsep dasar terlebih dahulu.',
                    'Lakukan simulasi kuis secara berkala untuk mengevaluasi pemahaman.',
                    'Gunakan materi pendukung untuk studi kasus.'
                ],
                'quiz_questions' => [
                    [
                        'content' => 'Apakah tujuan utama dari mempelajari konsep dasar materi ini?',
                        'options' => [
                            'A' => 'Mendapatkan nilai tanpa belajar',
                            'B' => 'Membangun pemahaman landasan yang kuat sebelum implementasi',
                            'C' => 'Menghindari tugas kuliah',
                            'D' => 'Mengganti seluruh sistem yang ada'
                        ],
                        'correct_answer' => 'B',
                        'explanation' => 'Pemahaman landasan sangat krusial untuk mempermudah implementasi praktis berikutnya.'
                    ],
                    [
                        'content' => 'Langkah pertama dalam penyelesaian studi kasus adalah...',
                        'options' => [
                            'A' => 'Menganalisis dan memahami masalah',
                            'B' => 'Langsung menulis solusi akhir',
                            'C' => 'Mengabaikan petunjuk',
                            'D' => 'Menunggu bantuan tutor'
                        ],
                        'correct_answer' => 'A',
                        'explanation' => 'Analisis awal membantu mendefinisikan batasan masalah dan strategi pemecahan yang efisien.'
                    ],
                    [
                        'content' => 'Manakah di bawah ini yang merupakan komponen penting dalam pembelajaran praktis?',
                        'options' => [
                            'A' => 'Hanya menghafal teori',
                            'B' => 'Eksperimen dan latihan terbimbing',
                            'C' => 'Menghindari kelas praktikum',
                            'D' => 'Menggunakan satu sumber saja'
                        ],
                        'correct_answer' => 'B',
                        'explanation' => 'Eksperimen langsung memperkuat pemahaman abstrak yang didapat dari teori.'
                    ],
                    [
                        'content' => 'Bagaimana cara terbaik mengukur kesiapan belajar kita?',
                        'options' => [
                            'A' => 'Mengerjakan kuis latihan dan melakukan evaluasi mandiri',
                            'B' => 'Tidak pernah menguji diri sendiri',
                            'C' => 'Bertanya langsung jawaban ke AI tanpa belajar',
                            'D' => 'Menunda belajar hingga hari ujian'
                        ],
                        'correct_answer' => 'A',
                        'explanation' => 'Kuis latihan membantu mengidentifikasi topik mana yang masih membutuhkan pendalaman lebih lanjut.'
                    ],
                    [
                        'content' => 'Apa peran utama tutor dalam forum FokusIn?',
                        'options' => [
                            'A' => 'Membagikan kunci jawaban langsung',
                            'B' => 'Membimbing dan memvalidasi pemahaman mahasiswa',
                            'C' => 'Menghapus postingan mahasiswa',
                            'D' => 'Memberikan nilai akhir'
                        ],
                        'correct_answer' => 'B',
                        'explanation' => 'Tutor berfungsi sebagai fasilitator untuk mengarahkan diskusi dan memverifikasi ketepatan jawaban.'
                    ]
                ]
            ];
        }

        // 5. Simpan kuis kustom hasil AI ke database
        $quizSetId = null;
        try {
            $quizSet = QuizSet::create([
                'category_id' => $request->category_id,
                'title' => 'Kuis AI: ' . $request->title,
            ]);

            foreach ($aiAnalysis['quiz_questions'] as $qData) {
                QuizQuestion::create([
                    'quiz_set_id' => $quizSet->id,
                    'content' => $qData['content'],
                    'options' => $qData['options'],
                    'correct_answer' => $qData['correct_answer'],
                    'explanation' => $qData['explanation'],
                ]);
            }

            $quizSetId = $quizSet->id;
        } catch (\Exception $e) {
            Log::error('Failed to save generated quiz during upload: ' . $e->getMessage());
        }

        // Hapus array quiz_questions agar tidak diduplikasi di field json ai_analysis
        $analysisSave = $aiAnalysis;
        unset($analysisSave['quiz_questions']);

        // 6. Simpan data ke exam_uploads
        $examUpload = ExamUpload::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'file_url' => $fileUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
            'extracted_text' => $extractedText,
            'ai_analysis' => $analysisSave,
            'quiz_set_id' => $quizSetId,
        ]);

        // Hapus cache ai_summaries kategori ini
        AiSummary::where('category_id', $request->category_id)->delete();

        // Load relations for response comfort
        $examUpload->load([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category',
            'quizSet'
        ]);

        return response()->json($examUpload, 201);
    }

    /**
     * Return detail exam_upload beserta relasi user, category, dan quizSet.
     */
    public function show($id)
    {
        $examUpload = ExamUpload::with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category',
            'quizSet' => function ($q) {
                $q->with('questions');
            }
        ])->findOrFail($id);

        return response()->json($examUpload);
    }

    /**
     * Hapus data dan file dari Cloudinary.
     */
    public function destroy($id)
    {
        $examUpload = ExamUpload::findOrFail($id);

        // Hanya pemilik dokumen atau admin yang boleh menghapusnya
        if (auth()->id() !== $examUpload->user_id && auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Anda tidak memiliki hak untuk menghapus dokumen ini.'], 403);
        }

        // Hapus file dari Cloudinary
        if ($examUpload->cloudinary_public_id) {
            $ext = pathinfo($examUpload->file_url, PATHINFO_EXTENSION);
            $resourceType = 'raw';
            if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $resourceType = 'image';
            } elseif (in_array(strtolower($ext), ['mp4', 'avi', 'mov', 'webm'])) {
                $resourceType = 'video';
            }
            cloudinary()->uploadApi()->destroy($examUpload->cloudinary_public_id, [
                'resource_type' => $resourceType
            ]);
        }

        // Hapus juga AI summary cache kategori ini agar sinkron
        AiSummary::where('category_id', $examUpload->category_id)->delete();

        // Hapus record dari database
        $examUpload->delete();

        return response()->json(['message' => 'Dokumen berhasil dihapus dari sistem.']);
    }

    /**
     * PUT /api/exam-uploads/{id}/extracted-text
     * Update hasil OCR (extracted_text) dari sebuah exam upload.
     */
    public function updateExtractedText(Request $request, $id)
    {
        try {
            $examUpload = ExamUpload::findOrFail($id);

            // Hanya pemilik dokumen atau admin yang boleh mengupdate
            if (auth()->id() !== $examUpload->user_id && auth()->user()->role !== 'admin') {
                return response()->json(['message' => 'Anda tidak memiliki hak untuk mengubah dokumen ini.'], 403);
            }

            $validated = $request->validate([
                'extracted_text' => 'required|string',
            ]);

            $examUpload->update(['extracted_text' => $validated['extracted_text']]);

            return response()->json([
                'message'        => 'Hasil OCR berhasil diperbarui.',
                'exam_upload'    => $examUpload->fresh(),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Dokumen tidak ditemukan.'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validasi gagal.', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
