<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SmartController;

// --------------------
// Login Routes
// --------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --------------------
// Admin Routes
// --------------------
Route::prefix('admin')->middleware(['auth', 'is_admin'])->name('admin.')->group(function () {

    Route::get('/dashboard', [SpkController::class, 'dashboard'])->name('dashboard');

    // Penilaian
    Route::get('/penilaian', [SpkController::class, 'dataPenilaian'])->name('penilaian.index');
    Route::get('/penilaian/data', [SpkController::class, 'dataPenilaian'])->name('penilaian.data');
    Route::get('/penilaian/input', [SmartController::class, 'inputPenilaianForm'])->name('penilaian.input');
    Route::post('/penilaian/simpan', [SmartController::class, 'simpanPenilaian'])->name('penilaian.simpan');
    Route::get('/penilaian/view', [SmartController::class, 'view'])->name('penilaian.view');
    Route::get('/penilaian/{id}', [SpkController::class, 'show'])->name('penilaian.show');
    Route::get('/penilaian/{id_siswa}/edit', [SmartController::class, 'editSiswa'])->name('penilaian.edit.siswa');

    // Kriteria
    Route::resource('kriteria', KriteriaController::class)->except(['show']);

    // Sub Kriteria
    Route::resource('subkriteria', SubKriteriaController::class)->except(['show']);

    // Siswa
    Route::resource('siswa', SiswaController::class)->except(['show']);

    // Proses dan Laporan
    Route::get('/proses-smart', [SmartController::class, 'proses'])->name('proses.smart');
    Route::get('/hasil', [SmartController::class, 'hasil'])->name('hasil');
    Route::get('/hasil/pdf', [SmartController::class, 'exportPdf'])->name('hasil.pdf');

});

// --------------------
// Redirect root ke dashboard jika login
// --------------------
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'is_admin']);