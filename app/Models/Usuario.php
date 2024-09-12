<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $fillable = ['rut','email','password','nombre','fono','rol'];
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;


    public function citas(){
        return $this->hasMany('App\Models\Cita','rut_usuario','rut');
    }

    public function detalle_cita(){
        return $this->hasMany('App\Models\DetalleCita','rut_usuario','rut');
    }


}
