<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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

Route::get('/auth/login',[LoginController::class, 'index'])->name('login');
Route::post('/auth/login-proses',[LoginController::class, 'proses'])->name('login-proses');
Route::get('/auth/logout',[LoginController::class, 'logout'])->name('logout');


Route::get('/admin/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/',[AdminController::class, 'index'])->name('index');