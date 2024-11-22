<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotaCliente extends Model
{
    use HasFactory;

    protected $table = 'mascota_cliente';
    protected $fillable = ['id_mascota', 'rut_cliente'];
    protected $primaryKey = ['id_mascota', 'rut_cliente'];
    public $timestamps = false;
    public $incrementing = false;

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'rut_cliente', 'rut');
    }

    public static function findByComposite($idMascota, $rutCliente)
    {
        return self::where('id_mascota', $idMascota)
                   ->where('rut_cliente', $rutCliente)
                   ->first();
    }
}
