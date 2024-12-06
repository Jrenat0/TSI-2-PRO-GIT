<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\ServicioRequest;
use Illuminate\Support\Facades\Gate;

class ServiciosController extends Controller
{

    public function index()
    {   
        $servicios = Servicio::get();

        return view('servicios.index', compact('servicios'));
    }


    public function create()
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        return view('servicios.create');
    }

    public function store(ServicioRequest $request)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $servicio = Servicio::create($request->validated());
        return redirect()->route('servicios.index')->with('success', 'El servicio se creo de manera exitosa!');
    }


    public function show(Servicio $servicio)
    {
        return view('servicios.show',compact('servicio'));
    }


    public function edit(Servicio $servicio)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        return view('servicios.edit',compact('servicio'));
    }


    public function update(ServicioRequest $request, Servicio $servicio)
    {   
        if (Gate::denies('admin-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $servicio->update($request->validated());

        return redirect()->route('servicios.index')->with('success', 'Servicio Editado de manera exitosa!');
    }


    public function destroy(Servicio $servicio)
    {

        if (Gate::denies('admin-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $pendientes = false;
        $cantidadServicios = Servicio::count();

        foreach($servicio->citas as $cita){
            if($cita->estado === 'P'){
                $pendientes = true;
            }
        }

        if ($pendientes){
            return redirect()->back()->with('error', 'El servicio es requerido en otras citas, por lo tanto no puede ser eliminado.');
        }

        if ($cantidadServicios <= 1){
            return redirect()->back()->with('error', 'No se puede eliminar el último servicio. Debe haber al menos uno registrado.');
        }

        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio Eliminado de manera exitosa!');
    }
}
