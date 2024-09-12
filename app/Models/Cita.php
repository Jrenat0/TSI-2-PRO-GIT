<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;


    //defino el identificador de la tabla como 'citas'.
    protected $table = 'citas';
    //defino los atributos de la tabla con '$fillable' para permitir el uso de funciones 'Illuminate'.
    protected $fillable = ['fecha','hora','pesaje','observaciones','estado','id_mascota','rut_usuario'];
    //desactivo los 'timestamps' de la tabla.
    public $timestamps = false;

    //**omito la primary-key ya que automaticamente se define como un atributo auto-incrementable, de tipo unsignedBigInteger, con nombre 'id'.**



    public function mascota(){ //defino la relacion 1 a 1, entre la tabla 'citas' y la tabla 'mascotas'.
        return $this->belongsTo('App\Models\Mascota','id_mascota','id');
    }

    public function usuario(){ //defino la relacion 1 a 1, entre la tabla 'citas' y la tabla 'usuarios'.
        return $this->belongsTo('App\Models\Usuario','rut_usuario','rut');
    }

    public function detalle_cita(){ //defino la relacion 1 a M, entre la tabla 'citas' y la tabla 'detalle_cita'.
        return $this->hasMany('App\Models\DetalleCita','id_cita','id');
    }

}
