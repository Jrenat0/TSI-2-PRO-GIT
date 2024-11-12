<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotaCliente extends Model
{
    use HasFactory;

    protected $table = 'mascota_cliente';
    protected $fillable = ['id_mascota','rut_cliente'];
    protected $primaryKey = ['id_mascota', 'rut_cliente'];

    public $timestamps = false;
    public $incrementing = false;


    public function mascota(){// defino la relacion 1 a 1 entre la tabla 'mascotacliente' y la tabla 'usuarios'.
        return $this->belongsTo('App\Models\Mascota','id_mascota','id');
    }

    public function cliente(){// defino la relacion 1 a 1 entre la tabla 'mascotacliente' y la tabla 'usuarios'.
        return $this->belongsTo('App\Models\Cliente','rut_cliente','rut');
    }


}
