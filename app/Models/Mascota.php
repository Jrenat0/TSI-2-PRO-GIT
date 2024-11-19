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
    protected $fillable = ['nombre','raza','sexo','color','peso','imagen','fecha_nacimiento'];
    //activo los timestamps
    public $timestamps = true;

    //**omito la primary-key ya que automaticamente se define como un atributo auto-incrementable, de tipo unsignedBigInteger, con nombre 'id'.**
    

    // public function mascota_cliente(){
    //     return $this->hasMany('App\Models\MascotaCliente','id_mascota','id');
    // }

    public function clientes()
{
    return $this->belongsToMany(Cliente::class, 'mascota_cliente', 'id_mascota', 'rut_cliente');
}


    public function citas(){ // defino la relacion 1 a M, entre la tabla 'mascotas' y la tabla 'citas.
        return $this->hasMany('App\Models\Cita','id_mascota','id');
    }

}
