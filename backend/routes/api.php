<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminQuizController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AIPatternController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamUploadController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MentoringController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TutorAnalyticsController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TutorScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ── HEALTH CHECK ROUTE (Akan menjadi /api)
// ==========================================
Route::get('/', function () {
    return response()->json(['message' => 'FokusIn API Running']);
});

// ==========================================
// ── PUBLIC ROUTES (Tidak Perlu Login) ──────
// ==========================================

Route::prefix('auth')->middleware('throttle:10,1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
});

// Q&A / Forum — Kategori & Daftar Post
Route::get('/categories',    [PostController::class, 'categories']);
Route::get('/posts',         [PostController::class, 'index']);
Route::get('/posts/{id}',    [PostController::class, 'show']);

// Statistik Global Sistem
Route::get('/global-stats',  [UserController::class, 'globalStats']);

// Materi Belajar (GET Publik)
Route::get('/materials',     [MaterialController::class, 'index']);
Route::get('/materials/{id}',[MaterialController::class, 'show']);

// Kuis (GET Publik)
Route::get('/quizzes',       [QuizController::class, 'index']);
Route::get('/quizzes/{id}',  [QuizController::class, 'show']);

// Mentoring — Daftar Tutor (Publik)
Route::get('/tutors',        [MentoringController::class, 'listTutors']);

// Testimonials (Publik)
Route::get('/testimonials/featured', [TestimonialController::class, 'getFeatured']);

// ==========================================
// ── PROTECTED ROUTES (Wajib Token Sanctum) ─
// ==========================================
Route::middleware('auth:sanctum')->group(function () {

    // ── Auth ───────────────────────────────
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me',      [AuthController::class, 'me']);

    // ── Forum & Postingan ──────────────────
    Route::post('/posts',                       [PostController::class, 'store']);
    Route::post('/posts/{id}/vote',             [PostController::class, 'vote']);
    Route::post('/posts/{id}/verify',           [PostController::class, 'verify']);
    Route::post('/posts/{id}/best-answer',      [PostController::class, 'setBestAnswer']);

    // ── Profil User ────────────────────────
    Route::get('/users/{id}/profile',           [UserController::class, 'profile']);
    Route::put('/users/{id}',                   [UserController::class, 'updateProfile']);

    // ── Notifikasi ─────────────────────────
    Route::get('/notifications',                [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read',     [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all',      [NotificationController::class, 'markAllAsRead']);

    // ── Exam Uploads (Arsip Ujian) ─────────
    Route::get('/exam-uploads',                 [ExamUploadController::class, 'index']);
    Route::get('/exam-uploads/{id}',            [ExamUploadController::class, 'show']);
    Route::post('/exam-uploads',                [ExamUploadController::class, 'store']);
    Route::put('/exam-uploads/{id}',            [ExamUploadController::class, 'update']);
    Route::delete('/exam-uploads/{id}',         [ExamUploadController::class, 'destroy']);

    // ── Materi Belajar ─────────────────────
    Route::post('/materials',                   [MaterialController::class, 'store']);
    Route::delete('/materials/{id}',            [MaterialController::class, 'destroy']);

    // ── Kuis (Admin/Tutor CRUD) ────────────
    Route::post('/quizzes',                     [AdminQuizController::class, 'store']);
    Route::put('/quizzes/{id}',                 [AdminQuizController::class, 'update']);
    Route::delete('/quizzes/{id}',              [AdminQuizController::class, 'destroy']);
    Route::post('/quizzes/{id}/attempt',        [QuizController::class, 'attempt']);

    // ── AI Pattern Analyzer ────────────────
    Route::post('/ai/analyze',                  [AIPatternController::class, 'analyze']);
    Route::get('/ai-pattern/summary',           [AIPatternController::class, 'summary']); // ?category_id=X
    Route::post('/ai-pattern/refresh',          [AIPatternController::class, 'refresh']);

    // ── Mentoring Sessions ─────────────────
    Route::get('/mentoring/sessions',                           [MentoringController::class, 'getSessions']);
    Route::get('/mentoring/sessions/{id}',                      [MentoringController::class, 'showSession']);
    Route::post('/mentoring/requests',                          [MentoringController::class, 'store']);
    Route::post('/mentoring/sessions',                          [MentoringController::class, 'store']);
    Route::patch('/mentoring/sessions/{id}/status',             [MentoringController::class, 'updateStatus']);
    Route::patch('/mentoring/sessions/{id}/update-details',     [MentoringController::class, 'updateDetails']);

    // ── Tutor (Profil & Detail) ────────────
    Route::get('/tutors/{id}',                  [TutorController::class, 'show']);

    // ── Tutor Schedule ─────────────────────
    Route::get('/tutor/schedule',               [TutorScheduleController::class, 'index']);
    Route::post('/tutor/schedule',              [TutorScheduleController::class, 'store']);

    // ── Tutor Analytics ────────────────────
    Route::get('/tutor/analytics',              [TutorAnalyticsController::class, 'analytics']);

    // ── Dashboard Pelajar & Tutor ──────────
    Route::get('/student/dashboard',            [DashboardController::class, 'student']);
    Route::get('/tutor/dashboard',              [DashboardController::class, 'tutor']);

    // ── Testimonials ───────────────────────
    Route::post('/testimonials',                [TestimonialController::class, 'store']);

    // ── Admin: User CRUD ───────────────────
    Route::get('/users',                        [AdminUserController::class, 'index']);
    Route::post('/users',                       [AdminUserController::class, 'store']);
    // PUT /api/users/{id} di-handle oleh UserController@updateProfile (self-update) DAN
    // AdminUserController@update (admin update any user). Pisahkan dengan prefix /admin
    // agar tidak konflik dengan self-update route di atas.
    Route::prefix('admin')->group(function () {
        Route::put('/users/{id}',               [AdminUserController::class, 'update']);
        Route::delete('/users/{id}',            [AdminUserController::class, 'destroy']);

        // ── Admin: Dashboard & Monitoring ──
        Route::get('/moderation',               [AdminDashboardController::class, 'moderation']);
        Route::get('/reports',                  [AdminDashboardController::class, 'reports']);
        Route::get('/ai-monitoring',            [AdminDashboardController::class, 'aiMonitoring']);
    });
});
