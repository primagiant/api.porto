<?php

use App\Http\Controllers\Admin\AngkatanController;
use App\Http\Controllers\Admin\FakultasController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PembimbingAkademikController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('angkatan', AngkatanController::class)->except(['show']);;
    Route::resource('fakultas', FakultasController::class)->except(['show']);;
    Route::resource('jurusan', JurusanController::class)->except(['show']);;
    Route::resource('prodi', ProdiController::class)->except(['show']);;

    Route::resource('admin-mahasiswa', MahasiswaController::class);
    Route::resource('admin-pa', PembimbingAkademikController::class);
});
