<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ShowMahasiswaController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.auth.login');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('mahasiswa/print', [MahasiswaController::class, 'print'])->name('mahasiswa.print');
    Route::get('mahasiswa/print/{mahasiswa}', [MahasiswaController::class, 'print_detail'])->name('mahasiswa.print.detail');
    Route::resource('mahasiswa', MahasiswaController::class);

    Route::get('matkul/print', [MataKuliahController::class, 'print'])->name('matkul.print');
    Route::resource('matkul', MataKuliahController::class);
});
Route::prefix('dashboard')->middleware('mahasiswa')->group(function () {
    Route::get('/data', [ShowMahasiswaController::class, 'show'])->name('mahasiswa.show');
});