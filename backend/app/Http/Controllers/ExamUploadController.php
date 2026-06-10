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
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|max:10240|mimes:pdf', // Max 10MB
            'extracted_text' => 'nullable|string',
        ]);

        // 2. Upload file ke Cloudinary menggunakan cloudinary()->uploadApi()->upload()
        $uploadedFile = cloudinary()->uploadApi()->upload($request->file('file')->getRealPath());
        $fileUrl = $uploadedFile['secure_url'];
        $cloudinaryPublicId = $uploadedFile['public_id'];

        // Fallback extracted text jika tidak dikirim dari client (untuk simulasi OCR/Analisis AI)
        $extractedText = $request->input('extracted_text') ?? 
            ("Hasil ekstraksi otomatis dari dokumen: " . $request->file('file')->getClientOriginalName());

        // 3. Simpan data ke exam_uploads
        $examUpload = ExamUpload::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'file_url' => $fileUrl,
            'cloudinary_public_id' => $cloudinaryPublicId,
            'extracted_text' => $extractedText,
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
            cloudinary()->uploadApi()->destroy($examUpload->cloudinary_public_id);
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
