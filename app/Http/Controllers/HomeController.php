<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Servicio;

class HomeController extends Controller
{
    public function index(){

        // Utilizo carbon para obtener la fecha actual.
        $fechaActual = Carbon::today()->toDateString();

        $citas = Cita::whereDate('fecha', $fechaActual)->orderBy('hora', 'asc')->get();

        $servicios = Servicio::orderBy('id','asc')->get();

        return view('home.index',compact(['citas','servicios']));
    }
}
