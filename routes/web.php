<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PeminjamanController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('bahan', BahanController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::get('/export/pemesanan', [PemesananController::class, 'export']);
Route::post('/validasi/pemesanan/{id}', [PemesananController::class, 'validasi']);
Route::resource('alat', AlatController::class);
