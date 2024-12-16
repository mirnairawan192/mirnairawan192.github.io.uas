<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KeranjangBelanjaController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman data ikan
Route::get('/ikan', [IkanController::class, 'index'])->name('ikan.index');
Route::get('/ikan/tambah', [IkanController::class, 'create'])->name('ikan.create');
Route::post('/ikan/tambah', [IkanController::class, 'store'])->name('ikan.store');
Route::get('/ikan/edit/{kode_ikan}', [IkanController::class, 'edit'])->name('ikan.edit');
Route::put('/ikan/edit/{kode_ikan}', [IkanController::class, 'update'])->name('ikan.update');
Route::delete('/ikan/hapus/{kode_ikan}', [IkanController::class, 'destroy'])->name('ikan.destroy');

// Route untuk halaman data pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai/tambah', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/edit/{kode_pegawai}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/edit/{kode_pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/hapus/{kode_pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

// Route untuk halaman keranjang belanja
Route::get('/keranjangbelanja', [KeranjangBelanjaController::class, 'index'])->name('keranjangbelanja.index'); // Menampilkan daftar keranjang belanja
Route::get('/keranjangbelanja/create', [KeranjangBelanjaController::class, 'create'])->name('keranjangbelanja.create'); // Form tambah keranjang
Route::post('/keranjangbelanja', [KeranjangBelanjaController::class, 'store'])->name('keranjangbelanja.store'); // Simpan data keranjang
Route::get('/keranjangbelanja/{id}/edit', [KeranjangBelanjaController::class, 'edit'])->name('keranjangbelanja.edit'); // Form edit keranjang
Route::put('/keranjangbelanja/{id}', [KeranjangBelanjaController::class, 'update'])->name('keranjangbelanja.update'); // Update data keranjang
Route::delete('/keranjangbelanja/{id}', [KeranjangBelanjaController::class, 'destroy'])->name('keranjangbelanja.destroy'); // Hapus data keranjang

// Route untuk aksi beli
Route::put('/keranjangbelanja/{id}/beli', [KeranjangBelanjaController::class, 'beli'])->name('keranjangbelanja.beli');

// Route untuk aksi batal
Route::put('/keranjangbelanja/{id}/batal', [KeranjangBelanjaController::class, 'batal'])->name('keranjangbelanja.batal');

// Fallback route untuk rute yang tidak ditemukan
Route::fallback(function () {
    return redirect()->route('keranjangbelanja.index');
});
