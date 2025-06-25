<?php

use App\Http\Controllers\DaftarWargaController;
use App\Http\Controllers\NomorRumahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPenghuniController;
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
    return view('dashboard');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //daftar nomor rumah
    Route::resource('nomor-rumah', NomorRumahController::class);
    Route::get('nomor-rumah/{id}', [NomorRumahController::class, 'show'])->name('nomor-rumah.show');
    Route::put('/nomor-rumah/{nomor_rumah}', [NomorRumahController::class, 'update'])->name('nomor-rumah.update');
    
    //riwayat penghuni
    Route::resource('riwayat-penghuni', RiwayatPenghuniController::class);
    Route::post('riwayat-penghuni/{id}/aktif', [RiwayatPenghuniController::class, 'setAktif'])->name('riwayat-penghuni.setAktif');
    Route::get('riwayat-penghuni/{id}/edit', [RiwayatPenghuniController::class, 'edit'])->name('riwayat-penghuni.edit');
    Route::put('riwayat-penghuni/{id}', [RiwayatPenghuniController::class, 'update'])->name('riwayat-penghuni.update');
    Route::patch('riwayat-penghuni/{id}/jadikan-kepala', [RiwayatPenghuniController::class, 'jadikanKepala'])->name('riwayat-penghuni.jadikan-kepala');
    
    //daftar warga
    Route::resource('daftar-warga', DaftarWargaController::class);
    
});

require __DIR__.'/auth.php';
