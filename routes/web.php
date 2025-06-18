<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('landing');
});

// Login
Route::get('/login/mahasiswa', [AuthController::class, 'showLoginMahasiswa'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [AuthController::class, 'loginMahasiswa']);

Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);

// Register
Route::get('/register/mahasiswa', [AuthController::class, 'showRegisterMahasiswa'])->name('register.mahasiswa');
Route::post('/register/mahasiswa', [AuthController::class, 'registerMahasiswa']);

Route::get('/register/admin', [AuthController::class, 'showRegisterAdmin'])->name('register.admin');
Route::post('/register/admin', [AuthController::class, 'registerAdmin']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Mahasiswa
    Route::get('/mahasiswa', [AdminController::class, 'mahasiswaIndex'])->name('admin.mahasiswa.index');

    // Mata Kuliah CRUD
    Route::get('/matakuliah', [AdminController::class, 'mataKuliahIndex'])->name('admin.matakuliah.index');
    Route::get('/matakuliah/create', [AdminController::class, 'createMataKuliah'])->name('admin.matakuliah.create');
    Route::post('/matakuliah', [AdminController::class, 'storeMataKuliah'])->name('admin.matakuliah.store');
    Route::get('/matakuliah/{mataKuliah}/edit', [AdminController::class, 'editMataKuliah'])->name('admin.matakuliah.edit');
    Route::put('/matakuliah/{mataKuliah}', [AdminController::class, 'updateMataKuliah'])->name('admin.matakuliah.update');
    Route::delete('/matakuliah/{mataKuliah}', [AdminController::class, 'destroyMataKuliah'])->name('admin.matakuliah.destroy');
});
