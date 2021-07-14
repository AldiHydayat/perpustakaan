<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'index'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.utama');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/operator', [OperatorController::class, 'anggota'])->name('operator.utama');
Route::get('/operator/anggota', [OperatorController::class, 'anggota'])->name('operator.anggota');
Route::post('/operator/anggota', [OperatorController::class, 'storeAnggota'])->name('operator.stranggota');
Route::get('/operator/anggota/{anggota}', [OperatorController::class, 'putAnggota'])->name('operator.putanggota');
Route::post('/operator/{anggota}/anggota', [OperatorController::class, 'updateAnggota'])->name('operator.updanggota');

Route::get('/operator/penerbit', [OperatorController::class, 'penerbit'])->name('operator.penerbit');
Route::post('/operator/penerbit', [OperatorController::class, 'storePenerbit'])->name('operator.strpenerbit');
Route::get('/operator/penerbit/{penerbit}', [OperatorController::class, 'putPenerbit'])->name('operator.putpenerbit');
Route::post('/oprerator/{penerbit}/penerbit', [OperatorController::class, 'updatePenerbit'])->name('operator.updpenerbit');

Route::get('/operator/kategori', [OperatorController::class, 'kategori'])->name('operator.kategori');
Route::post('/operator/kategori', [OperatorController::class, 'storeKategori'])->name('operator.strkategori');
Route::get('/operator/kategori/{kategori}', [OperatorController::class, 'putKategori'])->name('operator.putkategori');
Route::post('/operator/{kategori}/kategori', [OperatorController::class, 'updateKategori'])->name('operator.updkategori');

Route::get('/operator/buku', [OperatorController::class, 'buku'])->name('operator.buku');
Route::post('/operator/buku', [OperatorController::class, 'storeBuku'])->name('operator.strbuku');
Route::get('/operator/buku/{buku}', [OperatorController::class, 'putBuku'])->name('operator.putbuku');
Route::post('/operator/{buku}/buku', [OperatorController::class, 'updateBuku'])->name('operator.updbuku');

Route::get('/operator/transaksi', [OperatorController::class, 'transaksi'])->name('operator.transaksi');
Route::post('/operator/transaksi', [OperatorController::class, 'storeTransaksi'])->name('operator.strtransaksi');
Route::get('/operator/transaksi/{transaksi}', [OperatorController::class, 'putTransaksi'])->name('operator.puttransaksi');
Route::post('/operator/{transaksi}/transaksi', [OperatorController::class, 'updateTransaksi'])->name('operator.updtransaksi');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');