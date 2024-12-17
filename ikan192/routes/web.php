<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KeranjangBelanjaController;
use App\Http\Controllers\Karyawan1Controller;

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
Route::get('/keranjangbelanja', [KeranjangBelanjaController::class, 'index'])->name('keranjangbelanja.index');
Route::get('/keranjangbelanja/create', [KeranjangBelanjaController::class, 'create'])->name('keranjangbelanja.create');
Route::post('/keranjangbelanja', [KeranjangBelanjaController::class, 'store'])->name('keranjangbelanja.store');
Route::get('/keranjangbelanja/{id}/edit', [KeranjangBelanjaController::class, 'edit'])->name('keranjangbelanja.edit');
Route::put('/keranjangbelanja/{id}', [KeranjangBelanjaController::class, 'update'])->name('keranjangbelanja.update');
Route::delete('/keranjangbelanja/{id}', [KeranjangBelanjaController::class, 'destroy'])->name('keranjangbelanja.destroy');

// Route untuk aksi beli
Route::put('/keranjangbelanja/{id}/beli', [KeranjangBelanjaController::class, 'beli'])->name('keranjangbelanja.beli');

// Route untuk aksi batal
Route::put('/keranjangbelanja/{id}/batal', [KeranjangBelanjaController::class, 'batal'])->name('keranjangbelanja.batal');

// Route untuk halaman data karyawan1
Route::get('/karyawan1', [Karyawan1Controller::class, 'index'])->name('karyawan1.index');
Route::get('/karyawan1/tambah', [Karyawan1Controller::class, 'create'])->name('karyawan1.create');
Route::post('/karyawan1/tambah', [Karyawan1Controller::class, 'store'])->name('karyawan1.store');
Route::get('/karyawan1/edit/{nip}', [Karyawan1Controller::class, 'edit'])->name('karyawan1.edit');
Route::put('/karyawan1/edit/{nip}', [Karyawan1Controller::class, 'update'])->name('karyawan1.update');
Route::delete('/karyawan1/hapus/{nip}', [Karyawan1Controller::class, 'destroy'])->name('karyawan1.destroy');
Route::get('/karyawan1/{nip}', [Karyawan1Controller::class, 'show'])->name('karyawan1.show'); // Tambahan untuk detail karyawan1

// Fallback route untuk rute yang tidak ditemukan
Route::fallback(function () {
    return redirect()->route('keranjangbelanja.index');
});
