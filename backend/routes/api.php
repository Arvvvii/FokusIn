<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamUploadController;
use App\Http\Controllers\AIPatternController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ── PUBLIC ROUTES (Tidak Perlu Login) ──────
// ==========================================
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Q&A / Forum Kategori & Postingan
Route::get('/categories', [PostController::class, 'categories']);
Route::get('/posts', [PostController::class, 'index']);

// Statistik Global Sistem
Route::get('/global-stats', [UserController::class, 'globalStats']);

// Materi Belajar (GET Publik)
Route::get('/materials', [MaterialController::class, 'index']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);

// Kuis (GET Publik)
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);

// Mentoring - Daftar Tutor (Publik)
Route::get('/tutors', [MentoringController::class, 'listTutors']);

// ==========================================
// ── PROTECTED ROUTES (Wajib Token Sanctum) ─
// ==========================================
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth Profil & Logout
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);
    
    // Forum & Postingan (Tulis Post, Vote, Verifikasi, & Best Answer)
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{id}/vote', [PostController::class, 'vote']);
    Route::post('/posts/{id}/verify', [PostController::class, 'verify']);
    Route::post('/posts/{id}/best-answer', [PostController::class, 'setBestAnswer']);

    // Profil User Detail
    Route::get('/users/{id}/profile', [UserController::class, 'profile']);

    // Unggah Arsip Ujian (Exam Uploads)
    Route::get('/exam-uploads', [ExamUploadController::class, 'index']);
    Route::post('/exam-uploads', [ExamUploadController::class, 'store']);
    Route::delete('/exam-uploads/{id}', [ExamUploadController::class, 'destroy']);

    // Pola Rekomendasi Soal Belajar AI (Groq API)
    Route::get('/ai-pattern/summary', [AIPatternController::class, 'summary']); // Menggunakan query param ?category_id=X
    Route::post('/ai-pattern/refresh', [AIPatternController::class, 'refresh']);

    // Materi Belajar (Unggah & Hapus - Khusus Tutor/Admin)
    Route::post('/materials', [MaterialController::class, 'store']);
    Route::delete('/materials/{id}', [MaterialController::class, 'destroy']);

    // Ujian Kuis (Attempt)
    Route::post('/quizzes/{id}/attempt', [QuizController::class, 'attempt']);

    // Mentoring Sessions (Booking & Update Status)
    Route::post('/mentoring/sessions', [MentoringController::class, 'store']);
    Route::patch('/mentoring/sessions/{id}/status', [MentoringController::class, 'updateStatus']);
});
