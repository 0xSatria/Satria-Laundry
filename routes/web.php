<?php

use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\GajiKaryawanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\SimulasiTransaksiController;
use App\Http\Controllers\UserTbController;
use App\Http\Controllers\PenggunaanBarangController;
use App\Models\GajiKaryawan;
use App\Models\PenggunaanBarang;
use App\Models\SimulasiBarangController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');
// });

// Route::resource('detail_transaksi', DetailTransaksiController::class);
// Route::resource('member', MemberController::class);
// Route::resource('outlet', OutletController::class);
// Route::resource('paket', PaketController::class);
// Route::resource('transaksi', TransaksiController::class);
// Route::resource('user', UserController::class);
// Route::resource('login', LoginControler::class);
// Route::resource('inventory', InventoryController::class);
// Route::resource('penjemputan', PenjemputanController::class);
// Route::post('/status', [PenjemputanController::class, 'status'])->name('status');
Route::get('login', [LoginControler::class, 'index'])->name('login');
Route::get('home', [HomeController::class, 'index']);
Route::get('/', [LoginControler::class, 'index'])->name('login');
Route::post('/login', [LoginControler::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [LoginControler::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


Route::group(['prefix' => 'a', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('a.home');
    Route::resource('member', MemberController::class);
    Route::resource('outlet', OutletController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('penjemputan', PenjemputanController::class);
    Route::resource('user', UserTbController::class);
    Route::resource('databarang', DataBarangController::class);
    Route::resource('penggunaanbarang', PenggunaanBarangController::class);
    Route::get('export/paket', [PaketController::class, 'exportData'])->name('export-paket');
    Route::get('export/databarang', [DataBarangController::class, 'exportData'])->name('export-barang');
    Route::get('export/penggunaanbarang', [PenggunaanBarangController::class, 'exportData'])->name('export-penggunaanbarang');
    Route::get('databarangs/exportPDF/', [DataBarangController::class, 'exportPDF'])->name('exportPDF-databarang');
    Route::get('penggunaanbarangs/exportPDF/', [PenggunaanBarangController::class, 'exportPDF'])->name('exportPDF-penggunaanbarang');
    Route::post('databarang/import', [DataBarangController::class, 'importData'])->name('import-barang');
    Route::post('penggunaanbarang/import', [PenggunaanBarangController::class, 'importData'])->name('import-penggunaanbarang');
    Route::post('paket/import', [PaketController::class, 'importData'])->name('import-paket');
    Route::get('simulasibarang', [GajiKaryawanController::class, 'index']);
    Route::get('simulasitransaksi', [SimulasiTransaksiController::class, 'index']);
    Route::resource('inventory', InventoryController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('gaji', [GajiKaryawanController::class, 'index']);
    Route::get('data_karyawan', [SimulasiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
    Route::post('/status', [PenjemputanController::class, 'status'])->name('status');
    Route::post('/status', [DataBarangController::class, 'status'])->name('status');
    Route::post('/status', [PenggunaanBarangController::class, 'status'])->name('status');
    Route::get('/download/templateExcel/databarang', [DataBarangController::class, 'downloadTemplate'])->name('databarang.templateExcel.download');
});


Route::group(['prefix' => 'k', 'middleware' => ['isKasir', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('k.home');
    // Route::resource('member', MemberController::class);
    // Route::resource('paket', PaketController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('laporan', [LaporanController::class, 'index']);
});


Route::group(['prefix' => 'ow', 'middleware' => ['isOwner', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('ow.home');
    Route::get('laporan', [LaporanController::class, 'index']);
});



// // ATUH REGISTER
// Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
