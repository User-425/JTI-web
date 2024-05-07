<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembeliController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return route('auth.login');
});

// Route::get('/login', function () {
//     return view('layouts.login');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:Pegawai'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::get('/pegawai/daftar_produk', [PegawaiController::class, 'daftar_produk'])->name('pegawai.produk');
});


Route::middleware(['auth', 'role:Pembeli'])->group(function () {
    Route::get('/pembeli/dashboard', 'PembeliController@index')->name('pembeli.dashboard');;
});