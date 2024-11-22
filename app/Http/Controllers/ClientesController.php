<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\MascotaCliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clientes = Cliente::get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'El cliente se creo de manera exitosa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        // $citas = collect();
        // foreach ($cliente->mascotas as $mascota) {
        //     $citas = $citas->merge(Cita::where('id_mascota', $mascota->id)
        //         ->where('estado', 'T')
        //         ->get());
        // }

        // return view('clientes.show', compact(['cliente', 'citas']));


        $mascotas = Mascota::get();

        $mascotasnoligadas = [];

        foreach($mascotas as $mascota)
        {
            $relacion = MascotaCliente::findByComposite($mascota->id, $cliente->rut);
            if ($relacion === null){
                $mascotasnoligadas[] = $mascota;
            }
        }


        return view('clientes.show', compact(['cliente','mascotasnoligadas']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {   
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
