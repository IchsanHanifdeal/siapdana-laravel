<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KrediturController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate.login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store.register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/tambahpeminjaman', [PeminjamanController::class, 'store'])->name('store.peminjaman');
Route::put('/dashboard/tolak/{id_peminjaman}', [PeminjamanController::class, 'tolak'])->name('tolak_peminjaman');
Route::put('/dashboard/terima/{id_peminjaman}', [PeminjamanController::class, 'terima'])->name('terima_peminjaman');

Route::get('/dashboard/kreditur', [KrediturController::class, 'index'])->name('kreditur');
Route::delete('/dashboard/kreditur/{id_kreditur}', [KrediturController::class, 'destroy'])->name('destroy.kreditur');