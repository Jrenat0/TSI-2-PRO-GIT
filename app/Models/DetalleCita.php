<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCita extends Model
{
    use HasFactory;

    // defino el identificador de la tabla como 'detalle_cita'
    protected $table = 'detalle_cita';
    // defino los atributos de la tabla con '$fillable, para permitir el uso de funciones 'Illuminate'.
    protected $fillable = ['id_cita','id_servicio','rut_usuario'];
    // defino la primaryKey como compuesta.
    protected $primaryKey = ['id_cita','id_servicio'];
    // desactivo los 'timestamps' de la tabla.
    public $timestamps = false;
    // desactivo el 'auto-incremento' de la tabla.
    public $incrementing = false;


    public function cita(){ // defino la relacion 1 a 1 entre la tabla 'detalle_cita' y la tabla 'citas'.
        return $this->belongsTo('App\Models\Cita','id_cita','id');
    }

    public function servicio(){// defino la relacion 1 a 1 entre la tabla 'detalle_cita' y la tabla 'servicios'.
        return $this->belongsTo('App\Models\Servicio','id_servicio','id');
    }

    public function usuario(){// defino la relacion 1 a 1 entre la tabla 'detalle_cita' y la tabla 'usuarios'.
        return $this->belongsTo('App\Models\Usuario','rut_usuario','rut');
    }

}
