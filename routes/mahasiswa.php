<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:mahasiswa']], function () {
});
