<?php

use App\Http\Controllers\OutletController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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

Route::resource('detail_transaksi', DetailTransaksiController::class);
Route::resource('member', MemberController::class);
Route::resource('outlet', OutletController::class);
Route::resource('paket', PaketController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('user', UserController::class);
Route::resource('login', LoginControler::class);
Route::get('login', [LoginControler::class, 'index'])->name('login');
Route::get('home', [HomeController::class, 'index']);
Route::get('/login', [LoginControler::class, 'index'])->name('login');
Route::post('/login', [LoginControler::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [LoginControler::class, 'logout']);

Route::group(['prefix' => 'a', 'middleware' => ['isAdmin', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('a.home');
    Route::resource('member', MemberController::class);
    Route::resource('outlet', OutletController::class);
    Route::resource('paket', PaketController::class);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
});


Route::group(['prefix' => 'k', 'middleware' => ['isKasir', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('k.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::get('laporan', [LaporanController::class, 'index']);
});


Route::group(['prefix' => 'ow', 'middleware' => ['isOwner', 'auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('ow.home');
    Route::get('laporan', [LaporanController::class, 'index']);
});



// ATUH REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
