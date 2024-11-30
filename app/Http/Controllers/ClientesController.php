<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\MascotaCliente;
use App\Http\Requests\ClienteRequest;

class ClientesController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view("clientes.index",compact("clientes"));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $clientes = Cliente::query()
            ->when($search, function ($query) use ($search) {
                $query->where('nombre', 'like', "%{$search}%")
                    ->orWhere('rut', 'like', "%{$search}%");
            })
            ->get();

        return view('clientes.index', compact('clientes', 'search'));
    }


    public function create()
    {
        return view('clientes.create');
    }


    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        return redirect()->route('clientes.index')->with('success', 'El cliente se creo de manera exitosa!');
    }

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

        foreach ($mascotas as $mascota) {
            $relacion = MascotaCliente::findByComposite($mascota->id, $cliente->rut);
            if ($relacion === null) {
                $mascotasnoligadas[] = $mascota;
            }
        }


        return view('clientes.show', compact(['cliente', 'mascotasnoligadas']));
    }


    public function edit(Cliente $cliente)
    {

        return view('clientes.edit', compact('cliente'));
    }


    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()->route('clientes.index')->with('success', 'El cliente ha sido editado de manera exitosa!');
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
