<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests\ServicioRequest;

class ServiciosController extends Controller
{

    public function index()
    {   
        $servicios = Servicio::get();

        return view('servicios.index', compact('servicios'));
    }


    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicioRequest $request)
    {
        $servicio = Servicio::create($request->validated());
        return redirect()->route('servicios.index')->with('success', 'El servicio se creo de manera exitosa!');
    }


    public function show(Servicio $servicio)
    {
        return view('servicios.show',compact('servicio'));
    }


    public function edit(Servicio $servicio)
    {
        return view('servicios.edit',compact('servicio'));
    }


    public function update(ServicioRequest $request, Servicio $servicio)
    {
        $servicio->update($request->validated());

        return redirect()->route('servicios.index')->with('success', 'Servicio Editado de manera exitosa!');
    }


    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio Eliminado de manera exitosa!');
    }
}
