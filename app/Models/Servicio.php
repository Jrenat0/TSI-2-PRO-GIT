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



    public function citas(){
        return $this->belongsToMany('App\Models\Cita','detalle_cita','id_servicio','id_cita');
    }

}
