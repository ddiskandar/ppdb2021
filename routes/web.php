<?php

use App\Models\User;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/seleksi', function () {
    return view('dashboard');
})->name('seleksi');

Route::middleware(['auth:sanctum', 'verified'])->get('/pendaftaran', function () {
    return view('pendaftaran.show');
})->name('pendaftaran');

Route::middleware(['auth:sanctum', 'verified'])->get('/pembayaran', function () {
    return view('dashboard');
})->name('pembayaran');

Route::middleware(['auth:sanctum', 'verified'])->get('/master', function () {
    return view('dashboard');
})->name('master');