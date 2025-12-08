<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

Route::get('/', [VideoController::class, 'index'])->name('videos.index');    // halaman home
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show'); // detail video

// route simple admin (tanpa auth dulu)
Route::get('/admin/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/admin/videos', [VideoController::class, 'store'])->name('videos.store');
