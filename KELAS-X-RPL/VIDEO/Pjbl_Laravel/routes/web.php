<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front');
});

Route::get('/', [FrontController::class, 'index']);


Route::get('/show/{idkategori}', [FrontController::class, 'show']);
Route::get('/register', [FrontController::class, 'register']);
Route::get('/login', [FrontController::class, 'login']);
Route::get('/logout', [FrontController::class, 'logout']);
Route::post('/postregister', [FrontController::class, 'store']);
Route::post('/postlogin', [FrontController::class, 'postlogin']);

