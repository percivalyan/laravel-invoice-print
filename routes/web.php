<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProjectPenawaranController;
use App\Http\Controllers\FooterPenawaranController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\JenisPenawaranController;
use App\Http\Controllers\UraianJenisPekerjaanPenawaranController;
use App\Http\Controllers\TujuanPenawaranController;
use App\Http\Controllers\ProjectPembelianController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\CatatanPembelianController;
use App\Http\Controllers\FooterPembelianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/print', [PrintController::class, 'print'])->name('print');
Route::get('/penawaran', [PrintController::class, 'penawaran'])->name('penawaran');

Route::resource('projectPenawarans', ProjectPenawaranController::class);
Route::resource('footerPenawarans', FooterPenawaranController::class);
Route::resource('tujuanPenawarans', TujuanPenawaranController::class);
Route::resource('penawarans', PenawaranController::class);
Route::resource('jenisPenawarans', JenisPenawaranController::class);
Route::resource('uraianJenisPekerjaanPenawarans', UraianJenisPekerjaanPenawaranController::class);

Route::resource('projectPembelians', ProjectPembelianController::class);
Route::resource('pembelians', PembelianController::class);
Route::resource('catatanPembelians', CatatanPembelianController::class);
Route::resource('footerPembelians', FooterPembelianController::class);
