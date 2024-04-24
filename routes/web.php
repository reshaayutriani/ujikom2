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
use App\Http\Controllers\mejaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AbsensiKerjaController;
use App\Http\Controllers\ContactUsController;
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
        Route::resource('/meja', mejaController::class);
        Route::resource('/Kategori', KategoriController::class);
        Route::resource('/AbsensiKerja', AbsensiKerjaController::class);
        Route::get('export/jenis', [jenisController::class, 'exportData'])->name('export-jenis');
        Route::get('export/menu', [menuController::class, 'exportData'])->name('export-menu');
        Route::get('export/stok', [stokController::class, 'exportData'])->name('export-stok');
        Route::get('export/produk', [ProdukController::class, 'exportData'])->name('export-produk');
        Route::get('export/Kategori', [KategoriController::class, 'exportData'])->name('export-Kategori');
        Route::get('export/meja', [mejaController::class, 'exportData'])->name('export-meja');
        Route::get('export/AbsensiKerja', [AbsensiKerjaController::class, 'exportData'])->name('export-AbsensiKerja');
        Route::post('import/jenis', [jenisController::class, 'importData'])->name('import-jenis');
        Route::post('import/menu', [menuController::class, 'importData'])->name('import-menu');
        Route::get('import/stok', [stokController::class, 'importData'])->name('import-stok');
        Route::get('import/produk', [produkController::class, 'importData'])->name('import-produk');
        Route::post('import/meja', [mejaController::class, 'importData'])->name('import-meja');
        Route::post('import/kategori', [kategoriController::class, 'importData'])->name('import-kategori');
        Route::post('import/AbsensiKerja', [AbsensiKerjaController::class, 'importData'])->name('import-AbsensiKerja');
        Route::get('export/kategori/pdf', [kategoriController::class, 'generatepdf'])->name('export-kategori-pdf');
        Route::get('export/jenis/pdf', [jenisController::class, 'generatepdf'])->name('export-jenis-pdf');
        Route::get('export/menu/pdf', [menuController::class, 'generatepdf'])->name('export-menu-pdf');
        Route::get('export/AbsensiKerja/pdf', [AbsensiKerjaController::class, 'generatepdf'])->name('export-AbsensiKerja-pdf');
        Route::get('export/stok/pdf', [stokController::class, 'generatepdf'])->name('export-stok-pdf');
        Route::get('export/meja/pdf', [mejaController::class, 'generatepdf'])->name('export-meja-pdf');
        Route::get('/', [ContactUsController::class, 'index']);
        Route::post('/contact-us', [ContactUsController::class, 'store']);
        // Route::resource('/login', loginController::class);
        //Route::resource('/category', CategoryController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:2']], function () {
        Route::resource('/pelanggan', pelangganController::class);
        Route::resource('/pemesanan', pemesananController::class);
        Route::resource('/transaksi', transaksiController::class);
        Route::get('nota/{notafaktur}', [transaksiController::class, 'faktur']);
        Route::get('export/pelanggan', [pelangganController::class, 'exportData'])->name('export-pelanggan');
        Route::post('import/pelanggan', [pelangganController::class, 'importData'])->name('import-pelanggan');
        Route::get('export/pelanggan/pdf', [pelangganController::class, 'generatepdf'])->name('export-pelanggan-pdf');
        //Route::resource('/produk', ProdukController::class);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        Route::resource('/kategori', kategoroController::class);
    });

    Route::get('about', [HomeController::class, 'about']);
});
