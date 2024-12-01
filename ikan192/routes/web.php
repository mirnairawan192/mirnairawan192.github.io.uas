<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkanController;

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
    return view('welcome');
});

// Route untuk halaman data ikan
Route::get('/ikan', [IkanController::class, 'index'])->name('ikan.index');

// Route untuk menampilkan form tambah data ikan
Route::get('/ikan/tambah', [IkanController::class, 'create'])->name('ikan.create');

// Route untuk menyimpan data ikan baru
Route::post('/ikan/tambah', [IkanController::class, 'store'])->name('ikan.store');

// Route untuk menampilkan form edit data ikan
Route::get('/ikan/edit/{kode_ikan}', [IkanController::class, 'edit'])->name('ikan.edit');

// Route untuk memperbarui data ikan
Route::put('/ikan/edit/{kode_ikan}', [IkanController::class, 'update'])->name('ikan.update');

// Route untuk menghapus data ikan
Route::delete('/ikan/hapus/{kode_ikan}', [IkanController::class, 'destroy'])->name('ikan.destroy');

// Redirect route jika pengguna masuk route yang tidak ada
Route::fallback(function () {
    return redirect()->route('ikan.index');
});
