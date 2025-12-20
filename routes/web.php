<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan/create', [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan');
Route::get('/karyawan/{id}/edit', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan');
Route::post('/karyawan/{id}/update', [App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan');
Route::get('/karyawan/delete/{id}', [App\Http\Controllers\KaryawanController::class, 'delete'])->name('karyawan');

Route::get('/project',[App\Http\Controllers\ProjectController::class, 'index'])->name('project');

Route::get('/pesanan', [App\Http\Controllers\PesananController::class, 'index'])->name('pesanan');



Route::get('/produk', [App\Http\Controllers\UserProductController::class, 'index'])->name('produk');
Route::get('/datapelanggan', [App\Http\Controllers\UserController::class, 'index'])->name('datapelanggan');
Route::get('/datapelanggan/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('datapelanggan');
Route::post('/datapelanggan/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('datapelanggan');


Route::resource('products', ProductController::class);
    


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
