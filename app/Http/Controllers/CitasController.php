<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Usuario;
use App\Models\Servicio;
use Illuminate\Support\Facades\Gate;

class CitasController extends Controller
{

    public function index()
    {
        return view('citas.index');
    }


    public function create(string $fecha)
    {

        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $mascotas = Mascota::get();

        $usuarios = Usuario::where('rol', 'Peluquero')->get();

        $servicios = Servicio::get();

        return view('citas.create', compact(['mascotas', 'usuarios', 'servicios', 'fecha']));
    }


    public function store(Request $request)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $fecha = Carbon::parse($request->fecha);
        $hora = Carbon::parse($request->hora);
        $servicios = $request->input('id_servicio');
        $duracionCita = (int) Servicio::whereIn('id', $servicios)->sum('duracion_estimada');
        $hora_termino = $hora->copy()->addMinutes($duracionCita);

        $conflicto = Cita::where('fecha', $fecha)
            ->where(function ($query) use ($hora, $hora_termino) {
                $query->whereBetween('hora', [$hora, $hora_termino])
                    ->orWhereBetween('hora_termino', [$hora, $hora_termino])
                    ->orWhere(function ($query) use ($hora, $hora_termino) {
                        $query->where('hora', '<=', $hora)
                            ->where('hora_termino', '>=', $hora_termino);
                    });
            })
            ->exists();

        if ($conflicto) {
            return redirect()->back()->with('error','Ya existe una cita en el mismo rango de tiempo.');
        }

        $cita = new Cita();

        $cita->fecha = Carbon::parse($request->fecha);
        $cita->hora = Carbon::parse($request->hora);
        $cita->hora_termino = $hora_termino;
        $cita->observaciones = $request->observaciones;
        $cita->estado = 'P';
        $cita->id_mascota = $request->id_mascota;


        $cita->save();

        foreach ($servicios as $servicio) {
            $rutusuarioKey = "rut_usuario" . $servicio;

            $cita->servicios()->attach($servicio, ['rut_usuario' => $request->$rutusuarioKey]);
        }

        return redirect()->route('citas.index')->with('success', '');

    }


    public function show(string $id)
    {
        $cita = Cita::where('id', $id)->first();

        $servicios = Servicio::get();

        return view('citas.show', compact('cita', 'servicios'));
    }


    public function edit(Cita $cita)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        if ($cita->estado == 'T') {
            return redirect()->back()->with('error', 'La cita se encuentra Terminada por lo cual no puede ser editada.');
        }

        $mascotas = Mascota::all();

        $usuarios = Usuario::where('rol', 'Peluquero')->get();

        $servicios = Servicio::all();
        return view('citas.edit', compact('cita', 'mascotas', 'usuarios', 'servicios'));
    }


    public function update(Request $request, Cita $cita)
    {

        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        // Actualizar los datos básicos de la cita
        $cita->update($request->except(['id_servicio', 'hora_termino'])); // Excluye relaciones y hora de término

        // Obtener los servicios seleccionados
        $servicios = $request->input('id_servicio', []);

        // Eliminar todos los servicios previamente asociados
        $cita->servicios()->detach();

        // Asociar los nuevos servicios con sus respectivos datos
        foreach ($servicios as $servicioId) {
            $rutusuarioKey = "rut_usuario" . $servicioId;

            $cita->servicios()->attach($servicioId, ['rut_usuario' => $request->$rutusuarioKey]);
        }

        $cita = Cita::where('id', $cita->id)->first();

        $duracionCita = 0;

        foreach ($cita->servicios as $servicio) {
            $duracionCita += $servicio->duracion_estimada;
        }

        $horaInicio = Carbon::parse($cita->hora);
        $horaTermino = $horaInicio->copy()->addMinutes($duracionCita);


        $cita->update(['hora_termino' => $horaTermino]);

        return redirect()->route('citas.index', $cita)->with('success', 'Cita actualizada exitosamente.');
    }



    public function destroy(Cita $cita)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        if ($cita->estado == 'T') {
            return redirect()->back()->with('error', 'La cita se encuentra Terminada por lo cual no puede ser eliminada.');
        }

        $cita->delete();
        return redirect()->route('citas.index')->with('success', '');
    }
}
