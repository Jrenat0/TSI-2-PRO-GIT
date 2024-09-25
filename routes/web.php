<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;






//Home routes

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

//Citas routes
Route::middleware(['auth'])->group(function () {
    Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
});
//Clientes routes
Route::middleware(['auth'])->group(function () {
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

    Route::get('/clientes/show', [ClientesController::class, 'show'])->name('clientes.show'); //Falta traspasar el "{id}" a la ruta.

    Route::get('/clientes/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
});
//Mascotas routes
Route::middleware(['auth'])->group(function () {
    Route::get('/mascotas', [MascotasController::class, 'index'])->name('mascotas.index');

    Route::get('/mascotas/show/{mascota}', [MascotasController::class, 'show'])->name('mascotas.show');

    Route::get('/mascotas/create', [MascotasController::class, 'create'])->name('mascotas.create');

    Route::post('/mascotas/store', [MascotasController::class, 'store'])->name('mascotas.store');

    Route::put('/mascotas/update/{mascota}', [MascotasController::class, 'update'])->name('mascotas.update');

    Route::delete('/mascotas/destroy/{mascota}', [MascotasController::class, 'destroy'])->name('mascotas.destroy');
});
//Servicios routes
Route::middleware(['auth'])->group(function () {
    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
});
//Usuarios routes
Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
});
// Auth routes

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/autenticar', [AuthController::class, 'autenticar'])->name('auth.autenticar');
});



Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


//Api routes
Route::middleware(['auth'])->group(function () {
    Route::get('/api/fetchMascotas/{rut_cliente}', [ApiController::class, 'fetchMascotas']);
    Route::get('/api/fillMascotas/{id}', [ApiController::class, 'fillMascotas']);
});
