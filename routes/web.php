<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Login routes
Route::get('/login/mahasiswa', [AuthController::class, 'showLoginMahasiswa'])->name('login.mahasiswa');
Route::post('/login/mahasiswa', [AuthController::class, 'loginMahasiswa']);

Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin']);

// Register routes
Route::get('/register/mahasiswa', [AuthController::class, 'showRegisterMahasiswa'])->name('register.mahasiswa');
Route::post('/register/mahasiswa', [AuthController::class, 'registerMahasiswa']);

Route::get('/register/admin', [AuthController::class, 'showRegisterAdmin'])->name('register.admin');
Route::post('/register/admin', [AuthController::class, 'registerAdmin']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

