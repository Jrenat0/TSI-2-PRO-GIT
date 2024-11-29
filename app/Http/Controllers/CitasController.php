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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('citas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mascotas = Mascota::get();

        $usuarios = Usuario::where('rol','Peluquero')->get();

        $servicios = Servicio::get();

        return view('citas.create', compact(['mascotas','usuarios','servicios']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cita = new Cita();

        $cita->fecha = Carbon::parse($request->fecha);
        $cita->hora = Carbon::parse($request->hora);
        $cita->observaciones = $request->observaciones;
        $cita->estado = 'P';
        $cita->id_mascota = $request->id_mascota;
        $cita->rut_usuario = $request->rut_usuario;

        $cita->save();

        $servicios = $request->input('id_servicio');

        foreach ($servicios as $servicio) {
            $cita->servicios()->attach($servicio, ['rut_usuario' => $request->rut_usuario]);
        }
        

        return redirect()->route('citas.index')->with('success','');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Cita::where('id', $id)->first();

        return view('citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
