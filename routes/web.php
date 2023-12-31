<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    // route khusus operator
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
});
Route::prefix('wali')->middleware(['auth', 'auth.wali'])->group(function () {
    // route khusus wali
    Route::get('beranda', [BerandaWaliController::class, 'index'])->name('wali.beranda');
});
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    // route khusus admin
});

// logout
Route::get('logout', function () {
    Auth::user()->logout();
});