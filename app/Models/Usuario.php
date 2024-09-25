<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory;

    //defino el identificador de la tabla como 'usuarios'.
    protected $table = 'usuarios';
    //defino los atributos de la tabla con '$fillable' para permitir el uso de las funciones 'Illuminate'.
    protected $fillable = ['rut', 'email', 'password', 'nombre', 'fono', 'rol'];
    //defino el atributo 'rut' como 'primaryKey'.
    protected $primaryKey = 'rut';
    //defino el tipo de dato de la 'primaryKey'.
    protected $keyType = 'string';
    //desactivo el 'auto-incremento' de 'la primaryKey'
    public $incrementing = false;
    //desactivo los 'timestamps' de la tabla.
    public $timestamps = true;


    public function citas()
    { //defino la relacion 1 a M, entre la tabla 'usuarios' y la tabla 'citas'.
        return $this->hasMany('App\Models\Cita', 'rut_usuario', 'rut');
    }

    public function detalle_cita()
    { //defino la relacion 1 a M, entre la tabla 'usuarios'  y la tabla 'detalle_cita'.
        return $this->hasMany('App\Models\DetalleCita', 'rut_usuario', 'rut');
    }

    // Auth 

    public function nombreRol(): String
    {
        return $this->rol;
    }

    public function esAdministrador(): bool
    {
        return $this->rol == 'Administrador';
    }

    public function esPeluquero(): bool
    {
        return $this->rol== 'Peluquero';
    }

    public function esSecretario(): bool
    {
        return $this->rol == 'Secretario';
    }
}