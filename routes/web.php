<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FakturController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [BarangController::class, 'index']);
        Route::get('/admin/barang/create', [BarangController::class, 'create']);
        Route::post('/admin/barang/store', [BarangController::class, 'store']);
        Route::get('/admin/barang/edit/{id}', [BarangController::class, 'edit']);
        Route::put('/admin/barang/update/{id}', [BarangController::class, 'update']);
        Route::delete('/admin/barang/delete/{id}', [BarangController::class, 'destroy']);
    });

    Route::middleware('user')->group(function () {
        Route::get('/user/katalog', [UserController::class, 'katalog']);
        Route::post('/user/add-to-keranjang/{id}', [UserController::class, 'addToKeranjang']);
        Route::get('/user/keranjang', [UserController::class, 'keranjang']);
        Route::get('/user/checkout', [UserController::class, 'checkout']);
        Route::post('/user/checkout/submit', [FakturController::class, 'generate']);
        Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');
    });
});
