<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ATH;

Route::get('/video', [VideoController::class, 'index'])->name('videos.index');    // halaman home
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show'); // detail video

// route simple admin (tanpa auth dulu)
Route::get('/admin/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/admin/videos', [VideoController::class, 'store'])->name('videos.store');

Route::get('/', function(){return view('videos.login');})->name('login');
Route::post('/login', [ATH::class, 'login'])->name('login.post');
Route::post('/logout', [ATH::class, 'logout'])->name('logout');
Route::get('/register', [ATH::class, 'showRegister'])->name('register');
Route::post('/register', [ATH::class, 'register']);
