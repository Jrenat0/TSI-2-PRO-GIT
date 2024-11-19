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
use App\Http\Controllers\MascotaClienteController;

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

    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');

    Route::get('/clientes/show/{cliente}', [ClientesController::class, 'show'])->name('clientes.show');

    Route::get('/clientes/edit/{cliente}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/update/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');

    Route::delete('/clientes/destroy/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
});

//Mascotas routes
Route::middleware(['auth'])->group(function () {
    Route::get('/mascotas', [MascotasController::class, 'index'])->name('mascotas.index');

    Route::get('/mascotas/show/{mascota}', [MascotasController::class, 'show'])->name('mascotas.show');

    Route::get('/mascotas/create', [MascotasController::class, 'create'])->name('mascotas.create');

    Route::post('/mascotas/store', [MascotasController::class, 'store'])->name('mascotas.store');

    Route::get('/mascotas/edit/{mascota}',[MascotasController::class, 'edit'])->name('mascotas.edit');

    Route::put('/mascotas/update/{mascota}', [MascotasController::class, 'update'])->name('mascotas.update');

    Route::delete('/mascotas/destroy/{mascota}', [MascotasController::class, 'destroy'])->name('mascotas.destroy');
});
//Servicios routes
Route::middleware(['auth'])->group(function () {
    Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');

    // Route::get('/servicios/show/{servicio}', [ServiciosController::class, 'show'])->name('servicios.show');

    Route::get('/servicios/edit/{servicio}', [ServiciosController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/update/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');

    Route::delete('/servicios/destroy/{servicio}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');


});
//Usuarios routes
Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

    Route::get('/usuarios/show/{usuario}', [UsuariosController::class, 'show'])->name('usuarios.show');

    Route::get('/usuarios/create' ,[UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');

    Route::get('/usuarios/edit/{usuario}', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    
    Route::put('/usuarios/update/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');

    Route::delete('/usuarios/destroy/{usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

});
// Auth routes

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/auth/login', [AuthController::class, 'autenticar'])->name('auth.autenticar');

    Route::get('/auth/forgot', [AuthController::class, 'forgot'])->name('auth.forgot');
    Route::post('/auth/forgot', [AuthController::class, 'forgotEmail'])->name('auth.forgotEmail');

    Route::get('/auth/change/{usuario}', [AuthController::class, 'changePass'])->name('auth.changePass');
    Route::put('/auth/change/{usuario}', [AuthController::class, 'storePass'])->name('auth.storePass');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::post('/mascotacliente/store', [MascotaClienteController::class,'store'])->name('mascotacliente.store');

    Route::delete('/mascotacliente/destroy', [MascotaClienteController::class,'destroy'])->name('mascotacliente.destroy');

});




//Api routes
Route::middleware(['auth'])->group(function () {
    Route::get('/api/fetchMascotas/{rut_cliente}', [ApiController::class, 'fetchMascotas']);
    Route::get('/api/fillMascotas/{id}', [ApiController::class, 'fillMascotas']);
});
