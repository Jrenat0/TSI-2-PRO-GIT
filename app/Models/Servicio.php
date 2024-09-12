<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $fillable = ['nombre','descripcion','duracion_estimada','costo'];
    public $timestamps = false;



    public function detalle_cita(){
        return $this->hasMany('App\Models\DetalleCita','id_servicio','id');
    }

}
