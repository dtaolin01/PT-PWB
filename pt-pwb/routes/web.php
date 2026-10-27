<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::get('/services', [ServiceController::class, 'service'])
    ->name('services');