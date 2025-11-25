<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'isAdmin'])->group( function() {
    Route::resource('tahun_ajar', TahunAjarController::class)->except(['tahun_ajar.index']);
    Route::resource('jurusan', JurusanController::class)->except(['jurusan.index']);
    Route::resource('kelas', KelasController::class)->except(['kelas.index']);
    Route::resource('siswa', SiswaController::class)->except(['siswa.index']);
    Route::resource('riwayat_kelas', KelasDetailController::class)->except(['riwayat_kelas.index']);
    Route::resource('users', RegisteredUserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
