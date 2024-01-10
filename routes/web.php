<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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
    return view('pages.home');
})->name('home');

Route::middleware('login')->group(function () {
    Route::get('admin', [MainController::class, 'admin'])->middleware('role')->name('admin');
    Route::post('admin', [MainController::class, 'nilai'])->middleware('role')->name('nilai');

    Route::get('overview', [MainController::class, 'index'])->name('overview');
    Route::get('detail', [MainController::class, 'detail'])->name('detail');
    Route::get('transkrip', [MainController::class, 'transkrip'])->name('transkrip');
    Route::get('download/{id}', [MainController::class, 'download'])->name('download');
    Route::get('form', [MainController::class, 'form'])->name('form');
    Route::get('form/organisasi', [MainController::class, 'form_organisasi'])->name('form.organisasi');
    Route::post('form/organisasi', [MainController::class, 'form_create'])->name('form.organisasi.post');
    Route::get('form/organisasi/update/{id}', [MainController::class, 'form_organisasi_update'])->name('form.organisasi.update');
    Route::post('form/organisasi/update/{id}', [MainController::class, 'form_update'])->name('form.organisasi.update.post');
    Route::get('form/organisasi/delete/{id}', [MainController::class, 'form_delete'])->name('form.organisasi.delete');
    Route::get('form/penalaran', [MainController::class, 'form_penalaran'])->name('form.penalaran');
    Route::post('form/penalaran', [MainController::class, 'form_create'])->name('form.penalaran.post');
    Route::get('form/penalaran/update/{id}', [MainController::class, 'form_penalaran_update'])->name('form.penalaran.update');
    Route::post('form/penalaran/update/{id}', [MainController::class, 'form_update'])->name('form.penalaran.update.post');
    Route::get('form/penalaran/delete/{id}', [MainController::class, 'form_delete'])->name('form.penalaran.delete');
});

Route::get('/login', [AuthController::class, 'view_login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
