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
    Route::prefix('pembimbingakademik')->group(function () {
        Route::resource('/', PembimbingAkademikController::class)->except(['create', 'edit']);
        Route::get('validMahasiswa', [PembimbingAkademikController::class, 'validMahasiswa']);
        Route::get('invalidMahasiswa', [PembimbingAkademikController::class, 'invalidMahasiswa']);
    });
    // Mahasiswa
    Route::prefix('mahasiswa')->group(function () {
        Route::resource('/', MahasiswaController::class)->except(['create', 'edit']);
        Route::post('assign/{id}', [MahasiswaController::class, 'assignMahasiswa']);
    });
    // Portofolio
    Route::prefix('portofolio')->group(function () {
        Route::resource('/', PortofolioController::class)->except(['create', 'edit', 'update']);
        Route::post('{portofolio}', [PortofolioController::class, 'update']);
        Route::post('validasi/{portofolio}', [PortofolioController::class, 'validasi']);
        Route::get('byNim/{nim}', [PortofolioController::class, 'byNim']);
        Route::get('count', [PortofolioController::class, 'countPortofolio']);
    });
    // Fakultas
    Route::prefix('fakultas')->group(function () {
        Route::resource('/', FakultasController::class)->except(['create', 'edit']);
        Route::get('all', [FakultasController::class, 'allData']);
    });
    // Jurusan
    Route::prefix('jurusan')->group(function () {
        Route::resource('/', JurusanController::class)->except(['create', 'edit']);
        Route::get('byFakultas/{fakultas_id}', [JurusanController::class, 'byFakultas']);
    });
    // Prodi
    Route::prefix('prodi')->group(function () {
        Route::resource('/', ProdiController::class)->except(['create', 'edit']);
        Route::get('byJurusan/{jurusan_id}', [ProdiController::class, 'byJurusan']);
    });
    // Angkatan
    Route::resource('angkatan', AngkatanController::class)->except(['create', 'edit']);
});
