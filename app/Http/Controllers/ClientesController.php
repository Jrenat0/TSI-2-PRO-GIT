<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\MascotaCliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Gate;

class ClientesController extends Controller
{

    public function index()
    {

        $clientes = Cliente::all();
        return view("clientes.index", compact("clientes"));
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
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        return view('clientes.create');
    }


    public function store(ClienteRequest $request)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $cliente = Cliente::create($request->validated());

        return redirect()->route('clientes.index')->with('success', 'El cliente se creo de manera exitosa!');
    }

    public function show(Cliente $cliente)
    {

        $mascotas = $cliente->mascotas;

        $citas = $mascotas->flatMap(function ($mascota) {
            return $mascota->citas;
        });

        $mascotas = Mascota::get();

        $mascotasnoligadas = [];

        foreach ($mascotas as $mascota) {
            $relacion = MascotaCliente::findByComposite($mascota->id, $cliente->rut);
            if ($relacion === null) {
                $mascotasnoligadas[] = $mascota;
            }
        }
        return view('clientes.show', compact(['cliente', 'mascotasnoligadas', 'citas']));
    }


    public function edit(Cliente $cliente)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        return view('clientes.edit', compact('cliente'));
    }


    public function update(ClienteRequest $request, Cliente $cliente)
    {

        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $cliente->update($request->validated());

        return redirect()->route('clientes.index')->with('success', 'El cliente ha sido editado de manera exitosa!');
    }


    public function destroy(Cliente $cliente)
    {
        if (Gate::denies('secretario-gestion')) {
            return redirect()->back()->with('warning', 'No tienes permiso para llevar a cabo esa accion');
        }

        $cantidadMascotas = $cliente->mascotas()->count();

        if ($cantidadMascotas >= 1){
            return redirect()->back()->with('error','El cliente tiene mascotas ligadas, por lo que no puede ser eliminado');
        }

        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
