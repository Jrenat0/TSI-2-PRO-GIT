<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MascotaCliente;
use App\Models\Mascota;
use App\Models\Cliente;

class ApiController extends Controller
{
    // Obtener las mascotas de un cliente utilizando la tabla intermedia
    public function fetchMascotas($rut_cliente)
    {
        // Buscar al cliente por su rut
        $cliente = Cliente::where('rut', $rut_cliente)->first();

        // Verificar si el cliente existe
        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        // Obtener las mascotas asociadas a este cliente utilizando la relación en la tabla intermedia
        $mascotasCliente = MascotaCliente::where('rut_cliente', $rut_cliente)
            ->with('mascota')  // Cargamos las mascotas asociadas
            ->get();

        // Extraer solo los datos de las mascotas (sin la tabla intermedia)
        $mascotas = $mascotasCliente->map(function ($item) {
            return $item->mascota; // Accedemos a la relación definida en el modelo MascotaCliente
        });

        // Retornar las mascotas en formato JSON
        return response()->json($mascotas);
    }

    // Obtener una mascota por su ID
    public function fillMascotas($id)
    {
        // Buscar la mascota por su ID
        $mascota = Mascota::find($id);

        // Verificar si la mascota existe
        if (!$mascota) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }

        // Retornar los detalles de la mascota en formato JSON
        return response()->json($mascota);
    }
}
