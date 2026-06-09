<?php

namespace App\Http\Controllers;

use App\Models\ExamUpload;
use App\Models\AiSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ExamUploadController extends Controller
{
    /**
     * Return paginasi exam_uploads beserta relasi user dan category.
     * PROTECTED — memerlukan auth:sanctum.
     */
    public function index()
    {
        $uploads = ExamUpload::with([
            'user' => function ($q) {
                $columns = ['id', 'name', 'role'];
                if (Schema::hasColumn('users', 'avatar_url')) {
                    $columns[] = 'avatar_url';
                }
                $q->select($columns);
            },
            'category'
        ])->latest()->paginate(10);

        return response()->json($uploads);
    }

    /**
     * Tampilkan detail satu data exam upload.
     * PROTECTED — memerlukan auth:sanctum.
     * GET /api/exam-uploads/{id}
     */
    public function show($id)
    {
        try {
            $examUpload = ExamUpload::with([
                'user' => function ($q) {
                    $columns = ['id', 'name', 'role'];
                    if (Schema::hasColumn('users', 'avatar_url')) {
                        $columns[] = 'avatar_url';
                    }
                    $q->select($columns);
                },
                'category',
            ])->findOrFail($id);

            return response()->json($examUpload);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Data upload tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil detail data upload.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle upload file ke Cloudinary dan simpan data ke exam_uploads.
     * Hapus cache terkait di tabel ai_summaries.
     */
    public function store(Request $request)
    {
        // Cek Role (Hanya Admin dan Tutor yang boleh upload)
        if (!in_array(auth()->user()->role, ['admin', 'tutor'])) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // 1. Validasi input
        $request->validate([
            'category_id'    => 'required|exists:categories,id',
            'file'           => 'required|file|max:10240|mimes:pdf', // Max 10MB
            'extracted_text' => 'nullable|string',
        ]);

        // 2. Upload file ke Cloudinary menggunakan cloudinary()->uploadApi()->upload()
        $uploadedFile      = cloudinary()->uploadApi()->upload($request->file('file')->getRealPath());
        $fileUrl           = $uploadedFile['secure_url'];
        $cloudinaryPublicId = $uploadedFile['public_id'];

        // Fallback extracted text jika tidak dikirim dari client (untuk simulasi OCR/Analisis AI)
        $extractedText = $request->input('extracted_text') ??
            ("Hasil ekstraksi otomatis dari dokumen: " . $request->file('file')->getClientOriginalName());

        // 3. Simpan data ke exam_uploads
        $examUpload = ExamUpload::create([
            'user_id'              => auth()->id(),
            'category_id'         => $request->category_id,
            'file_url'            => $fileUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
            'extracted_text'      => $extractedText,
            'original_filename'   => $request->file('file')->getClientOriginalName(),
        ]);

        // 4. Hapus cache terkait di tabel ai_summaries
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
            'category'
        ]);

        return response()->json($examUpload, 201);
    }

    /**
     * Tutor/Admin memperbarui status validasi dan catatan sebuah exam upload.
     * PROTECTED — memerlukan auth:sanctum.
     * PUT /api/exam-uploads/{id}
     */
    public function update(Request $request, $id)
    {
        try {
            // 1. Otorisasi: hanya tutor atau admin
            $authUser = auth()->user();
            if (!in_array($authUser->role, ['admin', 'tutor'])) {
                return response()->json([
                    'message' => 'Hanya tutor atau admin yang dapat memvalidasi dokumen ini.'
                ], 403);
            }

            // 2. Ambil data
            $examUpload = ExamUpload::findOrFail($id);

            // 3. Validasi input
            $validated = $request->validate([
                'status'           => 'required|in:pending,valid,invalid',
                'validation_notes' => 'nullable|string|max:2000',
            ]);

            // 4. Simpan perubahan
            $examUpload->update([
                'status'           => $validated['status'],
                'validation_notes' => $validated['validation_notes'] ?? $examUpload->validation_notes,
            ]);

            // 5. Load relasi untuk response
            $examUpload->load([
                'user' => function ($q) {
                    $columns = ['id', 'name', 'role'];
                    if (Schema::hasColumn('users', 'avatar_url')) {
                        $columns[] = 'avatar_url';
                    }
                    $q->select($columns);
                },
                'category',
            ]);

            return response()->json([
                'message'     => 'Status validasi berhasil diperbarui.',
                'exam_upload' => $examUpload,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Data upload tidak ditemukan.'], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui status validasi.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Hapus data dan file dari Cloudinary.
     * PROTECTED — memerlukan auth:sanctum.
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
            cloudinary()->uploadApi()->destroy($examUpload->cloudinary_public_id);
        }

        // Hapus juga AI summary cache kategori ini agar sinkron
        AiSummary::where('category_id', $examUpload->category_id)->delete();

        // Hapus record dari database
        $examUpload->delete();

        return response()->json(['message' => 'Dokumen berhasil dihapus dari sistem.']);
    }
}

