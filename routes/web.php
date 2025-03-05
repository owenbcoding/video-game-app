<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->name('index');

Route::view('/show', 'show')
    ->name('show');

require __DIR__.'/auth.php';
