<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;




//Home routes
Route::get('/',[HomeController::class,'index'])->name('home.index');

//Citas routes
Route::get('/citas',[CitasController::class,'index'])->name('citas.index');

//Clientes routes
Route::get('/clientes', [ClientesController::class,'index'])->name('clientes.index');

//Mascotas routes
Route::get('/mascotas',[MascotasController::class,'index'])->name('mascotas.index');

Route::get('/mascotas/show/{mascota}',[MascotasController::class,'show'])->name('mascotas.show');

Route::put('/mascotas/update/{mascota}', [MascotasController::class, 'update'])->name('mascotas.update');

Route::delete('/mascotas/destroy/{mascota}', [MascotasController::class, 'destroy'])->name('mascotas.destroy');

//Servicios routes
Route::get('/servicios',[ServiciosController::class,'index'])->name('servicios.index');

//Usuarios routes
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');

//Api routes
Route::get('/api/fetchMascotas/{rut_cliente}',[ApiController::class,'fetchMascotas']);
Route::get('/api/fillMascotas/{id}',[ApiController::class, 'fillMascotas']);