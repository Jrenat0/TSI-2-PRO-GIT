<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Servicio;

class HomeController extends Controller
{
    public function index()
    {

        // Utilizo carbon para obtener la fecha actual.
        $fechaActual = Carbon::today()->toDateString();

        // Pido las 3 primeras citas ingresadas para la fecha actual.
        $citas = Cita::whereDate('fecha', $fechaActual)
            ->orderBy('hora', 'asc')
            ->take(3)
            ->get();

        //Pido Los 3 primeros servicios ingresados.
        $servicios = Servicio::orderBy('id', 'asc')->take(3)->get();

        //Pido las 3 ultimas mascotas ingresadas.
        $mascotas = Mascota::orderBy('created_at','desc')->take(3)->get();

        $clientes = Cliente::orderBy('created_at', 'desc')->take(3)->get();

        return view('home.index', compact(['citas', 'servicios','mascotas','clientes']));
    }
}
