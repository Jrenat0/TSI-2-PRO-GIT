<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    // defino el identificador de la tabla como 'mascotas'.
    protected $table = 'mascotas';
    // defino los atributos de la tabla con '$fillable' para permitir el uso de las funciones 'Illuminate'.
    protected $fillable = ['nombre','raza','sexo','color','peso','fecha_nacimiento','rut_cliente'];
    // desactivo los 'timestamps' de la tabla.
    public $timestamps = false;

    //**omito la primary-key ya que automaticamente se define como un atributo auto-incrementable, de tipo unsignedBigInteger, con nombre 'id'.**
    


    public function cliente(){ // defino la relacion 1 a 1, entre la tabla 'mascotas' y la tabla 'clientes'.
        return $this->belongsTo('App\Models\Cliente','rut_cliente','rut');
    }

    public function citas(){ // defino la relacion 1 a M, entre la tabla 'mascotas' y la tabla 'citas.
        return $this->hasMany('App\Models\Cita','id_mascota','id');
    }

}
