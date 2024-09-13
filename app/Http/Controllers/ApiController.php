<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class ApiController extends Controller
{
    
    public function fetchMascotas($rut_cliente)
    {
        $mascotas = Mascota::where('rut_cliente', $rut_cliente)->get();
        return response()->json($mascotas);
    }

    public function fillMascotas($id)
    {
        $mascota = Mascota::where('id', $id)->first();
        return response()->json($mascota);
    }

}
