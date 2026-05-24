<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// ── PUBLIC ROUTES (Tidak perlu login) ────────────────
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/categories', [PostController::class, 'categories']);
Route::get('/posts', [PostController::class, 'index']);

// ── PROTECTED ROUTES (Wajib bawa Token Sanctum) ──────
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);
    
    Route::post('/posts', [PostController::class, 'store']);
});
