<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    //defino el identificador de la tabla como 'servicios'.
    protected $table = 'servicios';
    //defino los atributos de la tabla con '$fillable' para permitir el uso de las funciones 'Illuminate'.
    protected $fillable = ['nombre','descripcion','duracion_estimada','costo'];
    //desactivo los 'timestamps'.
    public $timestamps = false;

    //**omito la primary-key ya que automaticamente se define como un atributo auto-incrementable, de tipo unsignedBigInteger, con nombre 'id'.**


    public function detalle_cita(){ //defino la relacion 1 a M, entre la tabla 'servicios' y la tabla 'detalle_cita'.
        return $this->hasMany('App\Models\DetalleCita','id_servicio','id');

    }

}
