<?php

use App\Http\Controllers\SiswaController;
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

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('store');
Route::delete('/siswa/{id}/destroy', [SiswaController::class, 'destroy'])->name('destroy');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('edit');
Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('update');