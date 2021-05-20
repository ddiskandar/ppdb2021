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

Route::view('/', [App\Http\Controllers\PagesController::class, 'welcome'])
    ->name('welcome')->middleware('guest');

Route::get('/student/{student}/pdf', [App\Http\Controllers\StudentController::class, 'pdf'])->name('student.pdf');

Route::get('/student/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');

Route::get('/student/{student}/interview', [App\Http\Controllers\StudentController::class, 'interview'])->name('student.interview');

Route::get('/student/{student}/btq', [App\Http\Controllers\StudentController::class, 'btq'])->name('student.btq');

Route::get('/student/{student}/tpa', [App\Http\Controllers\StudentController::class, 'tpa'])->name('student.tpa');

Route::get('/student/{student}/pleno', [App\Http\Controllers\StudentController::class, 'pleno'])->name('student.pleno');

Route::get('/student/export', [App\Http\Controllers\StudentController::class, 'export'])->name('student.export');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [App\Http\Controllers\PagesController::class, 'dashboard'])
    ->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/home', [App\Http\Controllers\PagesController::class, 'home'])
    ->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/seleksi', function () {
    return view('seleksi.show');
})->name('seleksi');

Route::middleware(['auth:sanctum', 'verified'])->get('/pendaftaran', function () {
    return view('pendaftaran.show');
})->name('pendaftaran');

Route::middleware(['auth:sanctum', 'verified'])->get('/pembayaran', function () {
    return view('pembayaran.show');
})->name('pembayaran');

Route::middleware(['auth:sanctum', 'verified'])->get('/master', function () {
    return view('master.show');
})->name('master');