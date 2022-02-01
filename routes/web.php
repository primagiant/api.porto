<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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



Route::get('/test', function () {
    $dirParent = Storage::disk('google')->directories();
    $dir = Storage::disk('google')->directories($dirParent[0]);
    $dir = explode('/', $dir[0]);
    $filename = Storage::disk('google')->getMetadata($dir[1])['name'];
    dd($filename);
});

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('admin/{any}', function () {
        return view('admin.app');
    })->where('any', '.*');
});

Route::group(['middleware' => ['auth', 'role:pembimbingakademik']], function () {
    Route::get('pembimbing-akademik/{any}', function () {
        return view('pembimbingAkademik.app');
    })->where('any', '.*');
});

Route::group(['middleware' => ['auth', 'role:mahasiswa']], function () {
    Route::get('mahasiswa/{any}', function () {
        return view('mahasiswa.app');
    })->where('any', '.*');
});

require __DIR__ . '/auth.php';
