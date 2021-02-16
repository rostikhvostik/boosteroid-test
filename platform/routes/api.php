<?php

use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('song', SongController::class)->name('song');
Route::get('users', UserController::class)->name('users');
