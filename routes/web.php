<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', [GamesController::class, 'index'])->name('index');

Route::get('/games/{slug}', [GamesController::class, 'show'])
    ->name('games.show')
    ->where('slug', '[a-zA-Z0-9-]+');

Route::view('/show', 'show')
    ->name('show');

require __DIR__.'/auth.php';
