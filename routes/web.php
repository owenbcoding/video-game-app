<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', [GamesController::class, 'index'])->name('index');

// Route::view('/', 'index')
//     ->name('index');

// Route::view('/show', 'show')
//     ->name('show');

require __DIR__.'/auth.php';
