<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Usuario;
use App\Models\Servicio;

class CitasController extends Controller
{

    public function index()
    {
        return view('citas.index');
    }


    public function create(string $fecha)
    {
        $mascotas = Mascota::get();

        $usuarios = Usuario::where('rol','Peluquero')->get();

        $servicios = Servicio::get();

        return view('citas.create', compact(['mascotas','usuarios','servicios','fecha']));
    }


    public function store(Request $request)
    {
        $cita = new Cita();

        $cita->fecha = Carbon::parse($request->fecha);
        $cita->hora = Carbon::parse($request->hora);
        $cita->observaciones = $request->observaciones;
        $cita->estado = 'P';
        $cita->id_mascota = $request->id_mascota;


        $cita->save();

        $servicios = $request->input('id_servicio');

        foreach ($servicios as $servicio) {
            $rutusuarioKey = "rut_usuario" . $servicio;

            $cita->servicios()->attach($servicio, ['rut_usuario' => $request->$rutusuarioKey]);
        }
        

        return redirect()->route('citas.index')->with('success','');

    }


    public function show(string $id)
    {
        $cita = Cita::where('id', $id)->first();

        return view('citas.show', compact('cita'));
    }


    public function edit(Cita $cita)
    {
        $mascotas = Mascota::all();

        $usuarios = Usuario::all();

        $servicios = Servicio::all();
        return view('citas.edit', compact('cita', 'mascotas', 'usuarios', 'servicios'));
    }


    public function update(Request $request, Cita $cita)
    {
        $cita->update($request->all());

        $servicios = $request->input('id_servicio');
        // Hacer que si un servicio se desmarca, aplicar un detach del servicio, y si un servicio nuevo se marca, aplicarle una attach.

        return redirect()->route('citas.index',$cita)->with('success','');

    }


    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success','');
    }
}
