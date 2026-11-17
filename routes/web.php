<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TrackingAdminController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\TruckController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::get('/services', [ServiceController::class, 'service'])->name('services');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/trackingAdmin', [TrackingAdminController::class, 'index'])->name('trackingAdmin');

// Truck (halaman "Truck & Supir"). Nama route index tetap 'truck' supaya sidebar tidak berubah.
Route::controller(TruckController::class)->prefix('truck-supir')->group(function () {
    Route::get('/', 'index')->name('truck');
    Route::get('/create', 'create')->name('truck.create');
    Route::post('/', 'store')->name('truck.store');
    Route::get('/{truck}/edit', 'edit')->name('truck.edit');
    Route::put('/{truck}', 'update')->name('truck.update');
    Route::delete('/{truck}', 'destroy')->name('truck.destroy');
});

Route::controller(SupirController::class)->prefix('supir')->group(function () {
    Route::get('/', 'index')->name('supir');
    Route::get('/create', 'create')->name('supir.create');
    Route::post('/', 'store')->name('supir.store');
    Route::get('/{supir}/edit', 'edit')->name('supir.edit');
    Route::put('/{supir}', 'update')->name('supir.update');
    Route::delete('/{supir}', 'destroy')->name('supir.destroy');
});

Route::controller(PelangganController::class)->prefix('pelanggan')->group(function () {
    Route::get('/', 'index')->name('pelanggan');
    Route::get('/create', 'create')->name('pelanggan.create');
    Route::post('/', 'store')->name('pelanggan.store');
    Route::get('/{pelanggan}/edit', 'edit')->name('pelanggan.edit');
    Route::put('/{pelanggan}', 'update')->name('pelanggan.update');
    Route::delete('/{pelanggan}', 'destroy')->name('pelanggan.destroy');
});

/*
| Halaman admin hanya bisa dibuka dengan mengetik langsung:
|   domain/admin            -> Sign In
|   domain/admin/register   -> Sign Up
| Tidak ada link/tombol dari halaman publik yang mengarah ke sini.
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});