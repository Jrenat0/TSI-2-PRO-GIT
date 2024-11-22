<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MascotaCliente;
use App\Models\Mascota;
use App\Models\Cliente;
use App\Models\Cita;

use Carbon\Carbon;

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

        $mascotas = $cliente->mascotas;

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


    public function fillCitas($fecha)
    {

        $fecha = Carbon::parse($fecha);

        $citas = Cita::where('fecha', $fecha)->get();

        if ($citas->isEmpty()) {
            return response()->json(['message' => 'No hay citas disponibles'], 404);
        }

        return response()->json($citas->map(function ($cita) {
            return [
                'id' => $cita->id,
                'fecha' => $cita->fecha,
                'hora' => $cita->hora,
                'mascota' => [
                    'nombre' => $cita->mascota->nombre,
                    'id' => $cita->mascota->id,
                ],
                'cliente' => [
                    'nombre' => $cita->usuario->nombre,
                    'rut' => $cita->usuario->rut,
                ],
                'detalle_cita' => $cita->detalle_cita->isNotEmpty() ?
                    $cita->detalle_cita->map(function ($detalle) {
                        return $detalle->servicio;  // Solo devolver el nombre del servicio
                    })->implode(', ') : 'No hay servicios disponibles',  // Si no hay detalles de cita, mostrar mensaje
            ];
        }));


    }

}
