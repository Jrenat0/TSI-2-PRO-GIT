<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    //defino el identificador de la tabla como 'clientes'
    protected $table = 'clientes';
    //defino los atributos de la tabla con '$fillable' para su manipulacion masiva.
    protected $fillable = ['rut','nombre','fono','email','direccion'];
    //defino la primaryKey de la tabla ya que se precisa.
    protected $primaryKey = 'rut';
    //defino el tipo de dato que es la primaryKey.
    protected $keyType = 'string';
    //desactivo el 'auto-incremento' de la primaryKey.
    public $incrementing = false;
    //desactivo los 'timestamps' de la tabla.
    public $timestamps = true;


    public function mascotacliente(){ // defino la relacion 1 a M, entre la tabla 'mascotas' y la tabla 'citas.
        return $this->hasMany('App\Models\MascotaCliente','rut_cliente','rut');
    }


}
