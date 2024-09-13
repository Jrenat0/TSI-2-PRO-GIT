<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clientes = Cliente::Get();

        $mascotas = Mascota::limit(4)->orderBy('id','desc')->get();

        return view('mascotas.index',compact(['clientes','mascotas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {   
        
        $citas = Cita::where('id_mascota', $mascota->id)->orderBy('fecha', 'asc')->get();

        return view('mascotas.show',compact(['mascota','citas']));
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
    public function update(Request $request, Mascota $mascota)
    {
        $mascota->update([
            'nombre' => $request->nombreInput,
            'raza' => $request->razaInput,
            'sexo' => $request->sexoInput,
            'color' => $request->colorInput,
            'peso' => $request->pesoInput, 
        ]);

        return view('mascotas.show',compact('mascota'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }
}
