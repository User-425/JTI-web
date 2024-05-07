<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;

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

    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/{id}', [ProdukController::class, 'edit'])->name('produk.show');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::patch('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    
});


Route::middleware(['auth', 'role:Pembeli'])->group(function () {
    Route::get('/pembeli/dashboard', 'PembeliController@index')->name('pembeli.dashboard');;
});