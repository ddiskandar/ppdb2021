<?php

use App\Models\User;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;

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

Route::view('/', 'pages.welcome')
    ->middleware('guest')
    ->name('welcome');

Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::get('/home', [PagesController::class, 'home'])
        ->name('home');

    Route::get('/dashboard', [PagesController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/seleksi', [PagesController::class, 'seleksi'])
        ->name('seleksi');

    Route::get('/pendaftaran', [PagesController::class, 'pendaftaran'])
        ->name('pendaftaran');

    Route::get('/pembayaran', [PagesController::class, 'pembayaran'])
        ->name('pembayaran');

    Route::get('/master', [PagesController::class, 'master'])
        ->name('master');

    Route::get('/student/{student}/pdf', [StudentController::class, 'pdf'])
        ->name('student.pdf');

    Route::get('/student/{student}', [StudentController::class, 'show'])
        ->name('student.show');

    Route::get('/student/{student}/pembayaran', [StudentController::class, 'pembayaran'])
        ->name('student.pembayaran');

    Route::get('/student/{student}/interview', [StudentController::class, 'interview'])
        ->name('student.interview');

    Route::get('/student/{student}/btq', [StudentController::class, 'btq'])
        ->name('student.btq');

    Route::get('/student/{student}/tpa', [StudentController::class, 'tpa'])
        ->name('student.tpa');

    Route::get('/student/{student}/pleno', [StudentController::class, 'pleno'])
        ->name('student.pleno');

    Route::get('/student/export', [StudentController::class, 'export'])
        ->name('student.export');

});