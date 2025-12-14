<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ATH;

// Halaman video hanya bisa diakses setelah login
Route::get('/video', [VideoController::class, 'index'])
    ->middleware('auth')
    ->name('videos.index');    

Route::get('/videos/{video}', [VideoController::class, 'show'])
    ->middleware('auth')
    ->name('videos.show'); 

// route admin (sementara juga pakai auth)
Route::get('/admin/videos/create', [VideoController::class, 'create'])
    ->middleware('auth')
    ->name('videos.create');

Route::post('/admin/videos', [VideoController::class, 'store'])
    ->middleware('auth')
    ->name('videos.store');

// Auth routes
Route::get('/', function(){return view('videos.login');})->name('login');
Route::post('/login', [ATH::class, 'login'])->name('login.post');
// Route::post('/logout', [ATH::class, 'logout'])->name('logout');
Route::get('/register', [ATH::class, 'showRegister'])->name('register');
Route::post('/register', [ATH::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [ATH::class, 'logout'])->name('logout');
});