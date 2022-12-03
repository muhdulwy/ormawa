<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\PrestasiController;
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

Auth::routes();

Route::get('/', function() {
    return view('home');
})->name('home')->middleware('auth');
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('organisasi', OrganisasiController::class)->middleware('auth');
Route::resource('pengurus', PengurusController::class)->middleware('auth');
Route::resource('prestasi', PrestasiController::class)->middleware('auth');
Route::resource('kegiatan', KegiatanController::class)->middleware('auth');

