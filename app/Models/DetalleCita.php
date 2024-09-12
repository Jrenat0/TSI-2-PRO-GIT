<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCita extends Model
{
    use HasFactory;

    protected $table = 'detalle_cita';
    protected $fillable = ['id_cita','id_servicio','rut_usuario','valor_a_cancelar'];
    protected $primaryKey = ['id_cita','id_servicio'];
    public $timestamps = false;
    public $incrementing = false;


    public function cita(){
        return $this->belongsTo('App\Models\Cita','id_cita','id');
    }

    public function servicio(){
        return $this->belongsTo('App\Models\Servicio','id_servicio','id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario','rut_usuario','rut');
    }

}
