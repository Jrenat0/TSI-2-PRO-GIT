<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    protected $table = 'clientes';
    protected $fillable = ['rut','nombre','fono','email','direccion'];
    protected $primaryKey = 'rut';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;


    public function mascotas(){
        return $this->hasMany('App\Models\Mascota','rut_cliente','rut');
    }

    


}
