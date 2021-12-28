<?php

use App\Http\Controllers\API\AngkatanController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\JenisKegiatanController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\KategoriKegiatanController;
use App\Http\Controllers\API\KegiatanController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\ProdiController;
use App\Http\Controllers\API\PembimbingAkademikController;
use App\Http\Controllers\API\PortofolioController;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class)->only(['index', 'show']);
    Route::resource('jeniskegiatan', JenisKegiatanController::class)->only(['index', 'show']);
    Route::resource('kategorikegiatan', KategoriKegiatanController::class)->only(['index', 'show']);
    // Pembimbing Akademik
    Route::resource('pembimbingakademik', PembimbingAkademikController::class)->except(['create', 'edit']);
    // Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)->except(['create', 'edit']);
    Route::post('mahasiswa/assign/{id}', [MahasiswaController::class, 'assignMahasiswa']);
    // Portofolio
    Route::resource('portofolio', PortofolioController::class)->except(['create', 'edit', 'update']);
    Route::post('portofolio/{portofolio}', [PortofolioController::class, 'update']);
    Route::post('portofolio/validasi/{portofolio}', [PortofolioController::class, 'validasi']);
    Route::get('portofolio/byNim/{nim}', [PortofolioController::class, 'byNim']);
    Route::get('portofolio/count', [PortofolioController::class, 'countPortofolio']);
    // Fakultas
    Route::resource('fakultas', FakultasController::class)->except(['create', 'edit']);
    Route::get('fakultas/all', [FakultasController::class, 'allData']);
    // Jurusan
    Route::resource('jurusan', JurusanController::class)->except(['create', 'edit']);
    Route::get('jurusan/byFakultas/{fakultas_id}', [JurusanController::class, 'byFakultas']);
    // Prodi
    Route::resource('prodi', ProdiController::class)->except(['create', 'edit']);
    Route::get('prodi/byJurusan/{jurusan_id}', [ProdiController::class, 'byJurusan']);
    // Angkatan
    Route::resource('angkatan', AngkatanController::class)->except(['create', 'edit']);
});
