<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front');
});

Route::get('/', [FrontController::class, 'index']);
