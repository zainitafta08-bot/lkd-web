<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KalibrasiController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\InstalasiController;
use App\Http\Controllers\LaporanKalibrasiController;
use App\Http\Controllers\LaporanMaintenanceController;

Route::get('/', function () {
    return view('back.template.index');
});

Route::resource('kalibrasi', KalibrasiController::class);
Route::resource('maintenance', MaintenanceController::class);
Route::resource('instalasi', InstalasiController::class);

// Rute khusus untuk halaman "Cari Laporan"
// Ini akan menampilkan view tanpa data, hanya form pencarian
Route::get('/laporan/cari', [LaporanKalibrasiController::class, 'searchOnly'])->name('laporan.search_only');

Route::get('/laporan/download/{laporan}', [LaporanKalibrasiController::class, 'download'])->name('laporan.download');
// Rute untuk menampilkan hasil pencarian
// Ini akan mengambil data dan menampilkannya di halaman khusus pencarian
Route::get('/laporan/hasil-cari', [LaporanKalibrasiController::class, 'searchResults'])->name('laporan.search_results');

// Rute untuk manajemen laporan (tambah, edit, hapus, dan tampilkan semua)
Route::resource('laporan', LaporanKalibrasiController::class)->except(['index']);
Route::get('/laporan', [LaporanKalibrasiController::class, 'index'])->name('laporan.index');

Route::resource('laporan-maintenance', LaporanMaintenanceController::class);