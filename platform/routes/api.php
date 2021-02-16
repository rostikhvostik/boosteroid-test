<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('song', SongController::class)->name('song');
