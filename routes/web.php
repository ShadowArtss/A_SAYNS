<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\pagarecontroller;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // DEUDORES
    Route::view('/deudores', 'deudores.index')->name('deudores.index');
    Route::view('/deudores/create', 'deudores.create')->name('deudores.create');

    // DIRECCIONES
    Route::view('/direcciones', 'direcciones.index')->name('direcciones.index');
    Route::view('/direcciones/create', 'direcciones.create')->name('direcciones.create');

    // EXPEDIENTES
    Route::view('/expedientes', 'expedientes.index')->name('expedientes.index');
    Route::view('/expedientes/create', 'expedientes.create')->name('expedientes.create');

    // SEGUIMIENTOS
    Route::view('/seguimientos', 'seguimientos.index')->name('seguimientos.index');
    Route::view('/seguimientos/create', 'seguimientos.create')->name('seguimientos.create');

    // ASEGURADORAS
    Route::view('/aseguradoras', 'aseguradoras.index')->name('aseguradoras.index');
    Route::view('/aseguradoras/create', 'aseguradoras.create')->name('aseguradoras.create');

    // PAGARES
    // PAGARES
    Route::get('/pagares', [pagarecontroller::class, 'index'])->name('pagares.index');
    Route::get('/pagares/create', [pagarecontroller::class, 'create'])->name('pagares.create');
    Route::post('/pagares', [pagarecontroller::class, 'store'])->name('pagares.store'); // <-- Esta es la ruta que te faltaba

    // PAGOS
    Route::view('/pagos', 'pagos.index')->name('pagos.index');
    Route::view('/pagos/create', 'pagos.create')->name('pagos.create');

    // USUARIOS
    Route::view('/usuarios', 'usuarios.index')->name('usuarios.index');
    Route::view('/usuarios/create', 'usuarios.create')->name('usuarios.create');

    // ROLES
    Route::view('/roles', 'roles.index')->name('roles.index');
    Route::view('/roles/create', 'roles.create')->name('roles.create');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';