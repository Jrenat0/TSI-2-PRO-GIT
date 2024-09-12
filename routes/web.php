<?php


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

//Servicios routes
Route::get('/servicios',[ServiciosController::class,'index'])->name('servicios.index');

//Usuarios routes
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');