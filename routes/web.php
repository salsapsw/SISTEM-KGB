<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\PenjagaanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BulandepanController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('landing');
});

Auth::routes();

Route::group([], function () {
    Route::get('/landing', [LandingController::class, 'index'])->name('landing');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('profil', ProfilController::class)->only('index','update','edit');
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('divisi', DivisiController::class);
    Route::resource('penjagaan', PenjagaanController::class);
    Route::resource('bulandepan', BulandepanController::class)->only('index');
    
    // Route::get('/landing', [LandingController::class, 'index'])->name('landing');

    Route::get('/pegawaireport',[PDFController::class,'PegawaiReport']);
    Route::get('/penjagaanreport',[PDFController::class,'PenjagaanReport']);

    Route::get('/home', [App\Http\Controllers\BerandaController::class, 'index'])->name('home');
});