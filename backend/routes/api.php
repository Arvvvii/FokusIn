<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamUploadController;
use App\Http\Controllers\AIPatternController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TutorDashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ── HEALTH CHECK ROUTE (Akan menjadi /api)
// ==========================================
Route::get('/', function () {
    return response()->json([
        'message' => 'FokusIn API Running',
        'version' => '2.0',
    ]);
});


// ==========================================
// ── PUBLIC ROUTES (Tidak Perlu Login) ─────
// ==========================================

Route::prefix('auth')->middleware('throttle:10,1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
});

// Q&A / Forum Kategori & Postingan
Route::get('/categories', [PostController::class, 'categories']);
Route::get('/posts',      [PostController::class, 'index']);

// Statistik Global Sistem
Route::get('/global-stats', [UserController::class, 'globalStats']);

// Materi Belajar (GET Publik)
Route::get('/materials',      [MaterialController::class, 'index']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);

// Kuis (GET Publik)
Route::get('/quizzes',      [QuizController::class, 'index']);
Route::get('/quizzes/{id}', [QuizController::class, 'show']);

// Mentoring - Daftar Tutor (Publik)
Route::get('/tutors', [MentoringController::class, 'listTutors']);

// Kisah Sukses Mahasiswa / Testimonials (Publik)
Route::get('/testimonials/featured', [TestimonialController::class, 'getFeatured']);

// Papan Peringkat Siswa (Publik)
Route::get('/leaderboard', [LeaderboardController::class, 'index']);


// ==========================================
// ── PROTECTED ROUTES (Wajib Token Sanctum)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {

    // ------------------------------------------
    // Auth Profil & Logout
    // ------------------------------------------
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me',      [AuthController::class, 'me']);

    // ------------------------------------------
    // Forum & Postingan (Tulis Post, Vote, Verifikasi, & Best Answer)
    // ------------------------------------------
    Route::post('/posts',                        [PostController::class, 'store']);
    Route::post('/posts/{id}/vote',              [PostController::class, 'vote']);
    Route::post('/posts/{id}/verify',            [PostController::class, 'verify']);
    Route::post('/posts/{id}/best-answer',       [PostController::class, 'setBestAnswer']);

    // ------------------------------------------
    // Profil User Detail
    // ------------------------------------------
    Route::get('/users/{id}/profile', [UserController::class, 'profile']);

    // ------------------------------------------
    // Unggah Arsip Ujian (Exam Uploads)
    // ------------------------------------------
    Route::get('/exam-uploads',                                [ExamUploadController::class, 'index']);
    Route::post('/exam-uploads',                               [ExamUploadController::class, 'store']);
    Route::delete('/exam-uploads/{id}',                        [ExamUploadController::class, 'destroy']);
    Route::put('/exam-uploads/{id}/extracted-text',            [ExamUploadController::class, 'updateExtractedText']);

    // ------------------------------------------
    // Pola Rekomendasi Soal Belajar AI (Groq API)
    // ------------------------------------------
    Route::post('/ai/analyze',            [AIPatternController::class, 'analyze']);
    Route::get('/ai-pattern/summary',     [AIPatternController::class, 'summary']);
    Route::post('/ai-pattern/refresh',    [AIPatternController::class, 'refresh']);

    // ------------------------------------------
    // Materi Belajar (Unggah & Hapus - Khusus Tutor/Admin)
    // ------------------------------------------
    Route::post('/materials',         [MaterialController::class, 'store']);
    Route::delete('/materials/{id}',  [MaterialController::class, 'destroy']);

    // ------------------------------------------
    // Ujian Kuis (Attempt)
    // ------------------------------------------
    Route::post('/quizzes/{id}/attempt', [QuizController::class, 'attempt']);

    // ------------------------------------------
    // Mentoring Sessions (Booking & Update Status)
    // ------------------------------------------
    Route::get('/mentoring/sessions',              [MentoringController::class, 'getSessions']);
    Route::get('/mentoring/sessions/{id}',         [MentoringController::class, 'showSession']);
    Route::post('/mentoring/requests',             [MentoringController::class, 'store']);
    Route::post('/mentoring/sessions',             [MentoringController::class, 'store']);
    Route::patch('/mentoring/sessions/{id}/status',[MentoringController::class, 'updateStatus']);
    Route::post('/mentoring/sessions/{id}/feedback',[MentoringController::class, 'submitFeedback']);

    // ------------------------------------------
    // Tutor Details & Reviews
    // ------------------------------------------
    Route::get('/tutors/{id}',    [TutorController::class, 'show']);
    Route::get('/tutor/reviews',  [TutorController::class, 'reviews']);

    // ------------------------------------------
    // Kisah Sukses Mahasiswa / Testimonials (Protected)
    // ------------------------------------------
    Route::post('/testimonials', [TestimonialController::class, 'store']);

    // ------------------------------------------
    // Sistem Pelaporan (Reports)
    // ------------------------------------------
    Route::post('/reports', [ReportController::class, 'store']);

    // ------------------------------------------
    // Student: AI Insights & Ringkasan Belajar
    // ------------------------------------------
    Route::get('/student/ai-insights', [DashboardController::class, 'aiInsights']);

    // ------------------------------------------
    // Tutor: Analytics Timeline
    // ------------------------------------------
    Route::get('/tutor/analytics/timeline', [TutorDashboardController::class, 'analyticsTimeline']);

    // ------------------------------------------
    // ADMIN: Dashboard, Moderasi, Laporan, & Analytics
    // ------------------------------------------
    Route::prefix('admin')->group(function () {

        // Moderasi: Hapus Post yang Melanggar
        Route::delete('/moderation/posts/{id}', [AdminDashboardController::class, 'deletePost']);

        // Reports: Daftar & Resolve Laporan
        Route::get('/reports',                  [AdminDashboardController::class, 'getReports']);
        Route::patch('/reports/{id}/resolve',   [AdminDashboardController::class, 'resolveReport']);

        // Analytics: Timeline Registrasi User & Post per Bulan
        Route::get('/analytics/timeline',       [AdminDashboardController::class, 'analyticsTimeline']);
    });
});
