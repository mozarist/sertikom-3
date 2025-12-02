<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjarController;
use App\Models\jurusan;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\tahun_ajar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tahun_ajar = tahun_ajar::orderBy('kode_tahun_ajar', 'desc')->paginate(5);
    $kelas = kelas::orderBy('nama_kelas', 'desc')->paginate(5);
    $jurusan = jurusan::orderBy('kode_jurusan', 'desc')->paginate(5);
    $siswa = siswa::orderBy('nama_lengkap', 'desc')->paginate(10);
    return view('dashboard', compact('tahun_ajar', 'kelas', 'jurusan', 'siswa'));
})->middleware(['auth', 'verified'])->name('/');

Route::get('/dashboard', function () {
    $tahun_ajar = tahun_ajar::orderBy('kode_tahun_ajar', 'desc')->paginate(5);
    $kelas = kelas::orderBy('nama_kelas', 'desc')->paginate(5);
    $jurusan = jurusan::orderBy('kode_jurusan', 'desc')->paginate(5);
    $siswa = siswa::orderBy('nama_lengkap', 'desc')->paginate(10);
    return view('dashboard', compact('tahun_ajar', 'kelas', 'jurusan', 'siswa'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tahun_ajar', TahunAjarController::class)->only(['index']);
    Route::resource('jurusan', JurusanController::class)->only(['index']);
    Route::resource('kelas', KelasController::class)->only(['index']);
    Route::resource('siswa', SiswaController::class)->only(['index']);
});

Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::resource('tahun_ajar', TahunAjarController::class)->except(['index']);
    Route::resource('jurusan', JurusanController::class)->except(['index']);
    Route::resource('kelas', KelasController::class)->except(['index']);
    Route::resource('siswa', SiswaController::class)->except(['index']);
    Route::post('/siswa/{siswa}/naik-kelas', [SiswaController::class, 'naikKelas'])->name('siswa.naikKelas');
    Route::resource('users', RegisteredUserController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
