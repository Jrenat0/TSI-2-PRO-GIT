<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaRequest;

class MascotasController extends Controller
{
    public function index()
    {
        $clientes = Cliente::Get();
        $mascotas = Mascota::limit(4)->orderBy('id', 'desc')->get();

        return view('mascotas.index', compact(['clientes', 'mascotas']));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('mascotas.create', compact('clientes'));
    }

    public function store(MascotaRequest $request)
    {
        Mascota::create($request->validated());

        return redirect()->route('mascotas.index')->with('success', 'Mascota creada de manera exitosa!');
    }

    public function show(Mascota $mascota)
    {
        $citas = Cita::where('id_mascota', $mascota->id)->orderBy('fecha', 'asc')->get();

        return view('mascotas.show', compact(['mascota', 'citas']));
    }

    public function update(Mascota $mascota, MascotaRequest $request)
    {
        $mascota->update($request->validated());

        return redirect()->route('mascotas.index')->with('success', 'Mascota Editada de manera exitosa!');
    }

    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }
}
