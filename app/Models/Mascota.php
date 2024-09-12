<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';
    protected $fillable = ['nombre','raza','sexo','color','peso','fecha_nacimiento','rut_cliente']; //rut_cliente es la foranea en 'mascotas' que apunta al dueño de la mascota :)
    public $timestamps = false;
    


    public function cliente(){
        return $this->belongsTo('App\Models\Cliente','rut_cliente','rut');
    }

    public function citas(){
        return $this->hasMany('App\Models\Cita','id_mascota','id');
    }

}
