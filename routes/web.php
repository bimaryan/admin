<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controller\DashboardMahasiswaController;
use App\Http\Controllers\TaskController;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard/profil', [ProfileController::class, 'index'])->name('profil');
    Route::put('/admin/dashboard/profil/update-nama', [ProfileController::class, 'update_nama'])->name('profil.update_nama');
    Route::put('/admin/dashboard/profil/update-phone', [ProfileController::class, 'update_phone'])->name('profil.update_phone');
    Route::get('/admin/dashboard/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/admin/dashboard/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
    Route::get('/admin/dashboard/mahasiswa/create', [MahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
    Route::post('/admin/dashboard/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/admin/dashboard/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::put('/admin/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/admin/dashboard/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    Route::get('/admin/dashboard/tugas', [TaskController::class, 'index'])->name('admin.tugas.index');
    Route::get('/admin/dashboard/tugas/create', [TaskController::class, 'create'])->name('admin.tugas.create');
    Route::post('/admin/dashboard/tugas/', [TaskController::class, 'store'])->name('admin.tugas.store');
    Route::get('/admin/dashboard/tugas/{task}', [TaskController::class, 'show'])->name('admin.tugas.show');
    Route::get('/admin/dashboard/tugas/{task}/edit', [TaskController::class, 'edit'])->name('admin.tugas.edit');
    Route::put('/admin/dashboard/tugas/{task}', [TaskController::class, 'update'])->name('admin.tugas.update');
    Route::delete('/admin/dashboard/tugas/{task}', [TaskController::class, 'destroy'])->name('admin.tugas.destroy');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'mahasiswa'])->name('mahasiswa.dashboard');
    Route::get('/mahasiswa/dashboard/tugas/', [TaskController::class, 'indexMahasiswa'])->name('mahasiswa.tugas.index');
    Route::get('/mahasiswa/tugas/{task}', [TaskController::class, 'showMahasiswa'])->name('mahasiswa.tugas.show');
    Route::post('/mahasiswa/dashboard/tugas/{task}/submit', [TaskController::class, 'submit'])->name('mahasiswa.tugas.submit');
    Route::get('mahasiswa/tugas/{id}/edit', [TaskController::class, 'editSubmission'])->name('mahasiswa.tugas.edit');
    Route::get('/mahasiswa/dashboard/profil', [ProfileController::class, 'mahasiswa'])->name('mahasiswa.profil');
    Route::put('/mahasiswa/dashboard/profil/update-nama', [ProfileController::class, 'mahasiswa_update_nama'])->name('mahasiswa.profil.update_nama');
    Route::put('/mahasiswa/dashboard/profil/update-phone', [ProfileController::class, 'mahasiswa_update_phone'])->name('mahasiswa.profil.update_phone');
    Route::get('/mahasiswa/dashboard/settings', [SettingsController::class, 'mahasiswa'])->name('mahasiswa.settings');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
