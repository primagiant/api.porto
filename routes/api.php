<?php

use App\Http\Controllers\API\AngkatanController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FakultasController;
use App\Http\Controllers\API\JurusanController;
use App\Http\Controllers\API\KegiatanController;
use App\Http\Controllers\API\ProdiController;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('angkatan', AngkatanController::class)->except(['create', 'edit']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('fakultas', FakultasController::class)->except(['create', 'edit']);
    Route::resource('jurusan', JurusanController::class)->except(['create', 'edit']);
    Route::resource('prodi', ProdiController::class)->except(['create', 'edit']);
    Route::resource('kegiatan', KegiatanController::class)->only(['index', 'show']);
});
