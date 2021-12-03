<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('admin.app');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin/{any}', function () {
        return view('admin.app');
    })->where('any', '.*');
});

require __DIR__ . '/auth.php';
