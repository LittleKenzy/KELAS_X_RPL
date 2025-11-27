<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
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

Route::get('/beli/{idmenu}', [CartController::class, 'beli']);
Route::get('/hapus/{idmenu}', [CartController::class, 'hapus']);
Route::get('/tambah/{idmenu}', [CartController::class, 'tambah']);
Route::get('/kurang/{idmenu}', [CartController::class, 'kurang']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/batal', [CartController::class, 'batal']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::get('/admin', [AuthController::class, 'index']);
Route::post('admin/postlogin', [AuthController::class, 'postlogin']);

