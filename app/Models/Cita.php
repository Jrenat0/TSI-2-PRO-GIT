<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $fillable = ['fecha','hora','pesaje','observaciones','estado','id_mascota','rut_usuario']; //id_mascota apunta a la mascota que recibirá la cita y rut_usuario es el rut del peluquero que llevará la cita.
    public $timestamps = false;



    public function mascota(){
        return $this->belongsTo('App\Models\Mascota','id_mascota','id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','rut_usuario','rut');
    }

    public function detalle_cita(){
        return $this->hasMany('App\Models\DetalleCita','id_cita','id');
    }

}
