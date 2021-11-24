<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth:admin']],function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('angkatan', AngkatanController::class)->except(['create', 'edit']);
    Route::resource('fakultas', FakultasController::class)->except(['create', 'edit']);
    Route::resource('jurusan', JurusanController::class)->except(['create', 'edit']);
    Route::resource('prodi', ProdiController::class)->except(['create', 'edit']);
    Route::resource('kegiatan', KegiatanController::class)->only(['index', 'show']);
});
