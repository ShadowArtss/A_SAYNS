<?php

use App\Http\Controllers\DeudorController;
use App\Http\Controllers\PagareController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::middleware(['auth'])->group(function () {
        Route::resource('deudors', DeudorController::class);
        Route::resource('pagares', PagareController::class);
        Route::resource('pagos', PagoController::class);
    });

require __DIR__.'/auth.php';
