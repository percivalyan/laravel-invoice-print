<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProjectPenawaranController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\TujuanPenawaranController;
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
Route::resource('penawarans', PenawaranController::class);
Route::resource('tujuanPenawarans', TujuanPenawaranController::class);
