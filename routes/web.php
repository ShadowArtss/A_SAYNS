<?php

use App\Http\Controllers\DeudorController;
use App\Http\Controllers\pagoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagarecontroller;
use App\Http\Controllers\aseguradoracontroller;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\RolController;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('deudores', DeudorController::class);
    Route::resource('direcciones', DireccionController::class);
    Route::resource('pagares', PagareController::class);
    Route::resource('pagos', PagoController::class);
    Route::resource('aseguradoras', aseguradoracontroller::class);
    Route::resource('roles', RolController::class);

    // DEUDORES
    //Route::view('/deudores', 'deudores.index')->name('deudores.index');
    //Route::view('/deudores/create', 'deudores.create')->name('deudores.create');

    // DIRECCIONES
    //Route::view('/direcciones', 'direcciones.index')->name('direcciones.index');
    //Route::view('/direcciones/create', 'direcciones.create')->name('direcciones.create');

    // EXPEDIENTES
    Route::view('/expedientes', 'expedientes.index')->name('expedientes.index');
    Route::view('/expedientes/create', 'expedientes.create')->name('expedientes.create');

    // SEGUIMIENTOS
    Route::view('/seguimientos', 'seguimientos.index')->name('seguimientos.index');
    Route::view('/seguimientos/create', 'seguimientos.create')->name('seguimientos.create');

    // ASEGURADORAS
    //Route::view('/aseguradoras', 'aseguradoras.index')->name('aseguradoras.index');
    //Route::view('/aseguradoras/create', 'aseguradoras.create')->name('aseguradoras.create');

    // PAGARES
    Route::get('/pagares', [pagarecontroller::class, 'index'])->name('pagares.index');
    Route::get('/pagares/create', [pagarecontroller::class, 'create'])->name('pagares.create');
    Route::post('/pagares', [pagarecontroller::class, 'store'])->name('pagares.store'); // <-- Esta es la ruta que te faltaba

    Route::get('/pagares/{id}/edit', [pagarecontroller::class, 'edit'])->name('pagares.edit');
    Route::put('/pagares/{id}', [pagarecontroller::class, 'update'])->name('pagares.update');
    Route::delete('/pagares/{id}', [pagarecontroller::class, 'destroy'])->name('pagares.destroy');
    // PAGOS
    //Route::view('/pagos', 'pagos.index')->name('pagos.index');
    //Route::view('/pagos/create', 'pagos.create')->name('pagos.create');

    // USUARIOS
    Route::view('/usuarios', 'usuarios.index')->name('usuarios.index');
    Route::view('/usuarios/create', 'usuarios.create')->name('usuarios.create');

    // ROLES
    //Route::view('/roles', 'roles.index')->name('roles.index');
    //Route::view('/roles/create', 'roles.create')->name('roles.create');

    //PEYPAL_PAGOS
    Route::view('/paypal_pagos', 'paypal_pagos.index')->name('paypal_pagos.index');
    Route::view('/paypal_pagos/create', 'paypal_pagos.create')->name('paypal_pagos.create');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
