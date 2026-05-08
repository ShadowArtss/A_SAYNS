<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeudorController;
use App\Http\Controllers\pagarecontroller;
use App\Http\Controllers\aseguradoracontroller;
use App\Http\Controllers\pagocontroller;

route::middleware('auth')->group(function () {
    Route::resource('deudores', DeudorController::class);
    Route::resource('pagares', pagarecontroller::class);
    Route::resource('aseguradoras', aseguradoracontroller::class);
    Route::resource('pagos', pagocontroller::class);
});


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
