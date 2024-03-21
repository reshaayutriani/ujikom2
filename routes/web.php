<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\pemesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/home', HomeController::class);

    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        Route::resource('/jenis', jenisController::class);
        Route::resource('/menu', MenuController::class);
        Route::resource('/stok', StokController::class);
        Route::resource('/pelanggan', pelangganController::class);
        Route::resource('/produk', ProdukController::class);
        Route::get('export/jenis', [jenisController::class, 'exportData'])->name('export-jenis');
        Route::get('export/menu', [menuController::class, 'exportData'])->name('export-menu');
        Route::get('export/stok', [stokController::class, 'exportData'])->name('export-stok');
        Route::get('export/produk', [ProdukController::class, 'exportData'])->name('export-produk');
        Route::post('import/jenis', [jenisController::class, 'importData'])->name('import-jenis');
        Route::post('import/menu', [menuController::class, 'importData'])->name('import-menu');
        Route::get('import/stok', [stokController::class, 'importData'])->name('import-stok');
        Route::get('import/produk', [produkController::class, 'importData'])->name('import-produk');
        // Route::resource('/login', loginController::class);
        //Route::resource('/category', CategoryController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pelanggan', pelangganController::class);
        Route::resource('/pemesanan', pemesananController::class);
        Route::resource('/transaksi', transaksiController::class);
        Route::get('nota/{notafaktur}', [transaksiController::class, 'faktur']);
        //Route::resource('/produk', ProdukController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        Route::resource('/kategori', kategoroController::class);
    });

    Route::get('about', [HomeController::class, 'about']);
});
