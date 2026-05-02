<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Semua route di sini otomatis mendapat prefix /api
| dan menggunakan middleware 'api'.
|
*/

// ── Profil (single row) ────────────────────────────────────────────
Route::get('/profile', [ProfileController::class, 'index'])
     ->name('profile.index');

// ── Skills ──────────────────────────────────────────────────────────
Route::get('/skills', [SkillController::class, 'index'])
     ->name('skills.index');

// ── Portfolio CRUD ──────────────────────────────────────────────────
Route::apiResource('portfolios', PortfolioController::class);

// ── Blog CRUD ───────────────────────────────────────────────────────
Route::apiResource('blogs', BlogController::class);

// ── Contact Form ────────────────────────────────────────────────────
Route::post('/contact', [ContactController::class, 'store'])
     ->name('contact.store');
