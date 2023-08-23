<?php

use App\Http\Controllers\AdminPengajuanController;
use App\Http\Controllers\AdminTanggapanController;
use App\Http\Controllers\DashboardPengajuanController;
use App\Http\Controllers\Exportpdf;
use App\Http\Controllers\KadesValidasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SettingPasswordController;
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

// ----------------------------Login dan Registarai--------------------------------

Route::get('/', [LoginController::class, 'index'])->name('landing')->middleware('guest');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'store']);

// -------------------------------------Admin--------------------------------------

Route::resource('/admin/pengajuan', AdminPengajuanController::class)->except('create', 'edit')->middleware('admin');
Route::post('/admin/tanggapan', [AdminTanggapanController::class, 'store']);
Route::get('/admin/tanggapan', [AdminTanggapanController::class, 'show'])->middleware('auth');

Route::resource('/admin/pengguna', PenggunaController::class)->except('create', 'show', 'edit')->middleware('admin');

Route::resource('/admin/riwayat', RiwayatController::class)->middleware('admin');

// -------------------------------------Kades--------------------------------------

Route::resource('/kades/validasi', KadesValidasiController::class)->except('create', 'edit')->middleware('kades');
// Route::post('/admin/tanggapan', [AdminTanggapanController::class, 'store']);

// --------------------------------------User--------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('masyarakat');

Route::resource('/dashboard/pengajuan', DashboardPengajuanController::class)->except('show')->middleware('masyarakat');

// ------------------------------------Setting-------------------------------------

Route::resource('/setting/profile', SettingController::class)->only('index', 'edit', 'update')->middleware('auth');
Route::resource('/setting/ubah_password', SettingPasswordController::class)->only('index', 'update')->middleware('auth');

Route::get('/exportpdf/{pengajuan}', [Exportpdf::class, 'index'])->middleware('auth');