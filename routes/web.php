<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;

use App\Http\Controllers\Penawaran\ProjectPenawaranController;
use App\Http\Controllers\Penawaran\FooterPenawaranController;
use App\Http\Controllers\Penawaran\PenawaranController;
use App\Http\Controllers\Penawaran\JenisPenawaranController;
use App\Http\Controllers\Penawaran\UraianJenisPekerjaanPenawaranController;
use App\Http\Controllers\Penawaran\TujuanPenawaranController;

use App\Http\Controllers\Pembelian\ProjectPembelianController;
use App\Http\Controllers\Pembelian\PembelianController;
use App\Http\Controllers\Pembelian\CatatanPembelianController;
use App\Http\Controllers\Pembelian\FooterPembelianController;
use App\Http\Controllers\Pembelian\BahanPembelianController;

use App\Http\Controllers\Kwitansi\CatatanKwitansiController;
use App\Http\Controllers\Kwitansi\ProjectKwitansiController;
use App\Http\Controllers\Kwitansi\BatchKwitansiController;
use App\Http\Controllers\Kwitansi\UraianKwitansiController;
use App\Http\Controllers\Kwitansi\PekerjaanKwitansiController;
use App\Http\Controllers\Kwitansi\BatchPekerjaanKwitansiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RolesController::class);
    Route::resource('admins', AdminsController::class);

    // Login Routes.
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');

    // Logout Routes.
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Forget Password Routes.
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('password.update');
})->middleware('auth:admin');

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
Route::resource('bahanPembelians', BahanPembelianController::class);

Route::resource('projectKwitansis', ProjectKwitansiController::class);
Route::get('projectKwitansis/{projectKwitansi}/surat-jalan', [ProjectKwitansiController::class, 'showSuratJalan'])->name('projectKwitansis.showsuratjalan');
Route::get('projectKwitansis/{projectKwitansi}/invoice', [ProjectKwitansiController::class, 'showInvoice'])->name('projectKwitansis.showinvoice');
Route::get('projectKwitansis/{projectKwitansi}/bast', [ProjectKwitansiController::class, 'showBast'])->name('projectKwitansis.showbast');
Route::resource('catatanKwitansis', CatatanKwitansiController::class);

Route::resource('batchKwitansis', BatchKwitansiController::class);
Route::resource('uraianKwitansis', UraianKwitansiController::class);

Route::resource('pekerjaanKwitansis', PekerjaanKwitansiController::class);
Route::resource('batchPekerjaanKwitansi', BatchPekerjaanKwitansiController::class);