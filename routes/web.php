<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemasokController;

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
    if (auth()->check()) {
        if (auth()->user()->role === 'Pegawai') {
            return redirect()->route('pegawai.dashboard');
        } elseif (auth()->user()->role === 'Pembeli') {
            return redirect()->route('pembeli.dashboard');
        }
    }
    return view('auth.login');
});

// Route::get('/home', function () {
//     return route('auth.login');
// });

// Route::get('/login', function () {
//     return view('layouts.login');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:Pegawai'])->group(function () {
    Route::get('/dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
    Route::get('/daftar_produk', [PegawaiController::class, 'daftar_produk'])->name('daftar_produk');
    Route::get('/kelola_pemasok', [PemasokController::class, 'index'])->name('kelola_pemasok');

    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/{id}', [ProdukController::class, 'edit'])->name('produk.show');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

    Route::get('/pemasok/tambah', [PemasokController::class, 'create'])->name('pemasok.create');
    Route::get('/pemasok/{id}', [PemasokController::class, 'edit'])->name('pemasok.show');
    Route::delete('/pemasok/{id}', [PemasokController::class, 'destroy'])->name('pemasok.destroy');
    Route::patch('/pemasok/{id}', [PemasokController::class, 'update'])->name('pemasok.update');
    Route::post('/pemasok', [PemasokController::class, 'store'])->name('pemasok.store');
    
});


Route::middleware(['auth', 'role:Pembeli'])->group(function () {
    Route::get('/pembeli/dashboard', [PembeliController::class, 'index'])->name('pembeli.dashboard');;
});