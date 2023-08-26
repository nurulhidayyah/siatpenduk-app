<?php

use App\Http\Controllers\AdminPengajuanController;
use App\Http\Controllers\AdminTanggapanController;
use App\Http\Controllers\DashboardPengajuanController;
use App\Http\Controllers\Exportpdf;
use App\Http\Controllers\KadesValidasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LoginController::class, 'index'])->name('landing');
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

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

Route::resource('/kades/validasi', KadesValidasiController::class)->only('index', 'update')->middleware('kades');
// Route::post('/admin/tanggapan', [AdminTanggapanController::class, 'store']);

// --------------------------------------User--------------------------------------

Route::get('/user', function () {
    return view('user.index');
})->middleware('masyarakat');

Route::resource('/user/profile', ProfileController::class)->only('index', 'edit', 'update')->middleware('masyarakat');

Route::resource('/user/pengajuan', DashboardPengajuanController::class)->except('create')->middleware('masyarakat');
Route::get('user/tracing/{id}/pengajuan-surat', [DashboardPengajuanController::class, 'pengajuanSurattracing'])->name('pengajuan_surat_tracing');

// ------------------------------------Setting-------------------------------------

Route::resource('/setting/profile', SettingController::class)->only('index', 'edit', 'update')->middleware('else');
Route::resource('/setting/ubah_password', SettingPasswordController::class)->only('index', 'update')->middleware('else');

Route::get('/exportpdf/{pengajuan}', [Exportpdf::class, 'index'])->middleware('auth');