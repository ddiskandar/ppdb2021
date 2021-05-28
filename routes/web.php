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
        ->middleware(['role:student'])
        ->name('home');

    Route::get('/dashboard', [PagesController::class, 'dashboard'])
        ->middleware(['role:committee|interviewer|testers|officer|financial|admin'])
        ->name('dashboard');

    Route::get('/seleksi', [PagesController::class, 'seleksi'])
        ->middleware(['can:process seleksi'])
        ->name('seleksi');

    Route::get('/pendaftaran', [PagesController::class, 'pendaftaran'])
    ->middleware(['can:process pendaftaran'])
        ->name('pendaftaran');

    Route::get('/pembayaran', [PagesController::class, 'pembayaran'])
        ->middleware(['can:process pembayaran'])
        ->name('pembayaran');

    Route::get('/master', [PagesController::class, 'master'])
        ->middleware(['role:admin'])
        ->name('master');

    Route::get('/student/{student}/print', [StudentController::class, 'print'])
        ->middleware(['role:student'])
        ->name('student.print');

    Route::get('/student/{student}/pdf', [StudentController::class, 'pdf'])
        ->middleware(['can:print student'])
        ->name('student.pdf');

    Route::get('/student/{student}', [StudentController::class, 'show'])
        ->middleware(['role:student'])
        ->name('student.show');

    Route::get('/student/{student}/edit', [StudentController::class, 'edit'])
        ->middleware(['can:edit student'])
        ->name('student.edit');

    Route::get('/student/{student}/pembayaran', [StudentController::class, 'pembayaran'])
        ->middleware(['can:process pembayaran'])
        ->name('student.pembayaran');

    Route::get('/student/{student}/interview', [StudentController::class, 'interview'])
        ->middleware(['can:process wawancara'])
        ->name('student.interview');

    Route::get('/student/{student}/btq', [StudentController::class, 'btq'])
        ->middleware(['can:process btq'])
        ->name('student.btq');

    Route::get('/student/{student}/tpa', [StudentController::class, 'tpa'])
        ->middleware(['can:process tpa'])
        ->name('student.tpa');

    Route::get('/student/{student}/pleno', [StudentController::class, 'pleno'])
        ->middleware(['can:process pleno'])
        ->name('student.pleno');

    Route::get('/students/export', [StudentController::class, 'export'])
        ->middleware(['can:download excel'])
        ->name('student.export');

});