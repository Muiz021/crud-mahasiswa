<?php

use App\Http\Controllers\MahasiswaController;
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



route::get('/',[MahasiswaController::class,'index'])->name('mahasiswa.index');
route::post('/',[MahasiswaController::class,'store'])->name('mahasiswa.store');
route::get('/mahasiswa/create',[MahasiswaController::class,'create'])->name('mahasiswa.create');
route::get('/mahasiswa/{id}/show',[MahasiswaController::class,'show'])->name('mahasiswa.show');
route::get('/mahasiswa/{id}',[MahasiswaController::class,'edit'])->name('mahasiswa.edit');
route::put('/mahasiswa/{id}/edit',[MahasiswaController::class,'update'])->name('mahasiswa.update');
route::delete('/mahasiswa/{id}',[MahasiswaController::class,'destroy'])->name('mahasiswa.destroy');

