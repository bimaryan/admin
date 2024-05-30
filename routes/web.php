<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Login;

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

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login-proses', [LoginController::class, 'proses'])->name('login-proses');
Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard/profil', [ProfileController::class, 'index'])->name('profil');
    Route::get('/admin/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/admin/dashboard/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/admin/dashboard/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/admin/dashboard/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/admin/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/admin/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
