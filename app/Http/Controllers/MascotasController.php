<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaRequest;
use App\Models\MascotaCliente;

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
        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->peso = $request->peso;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->imagen = $request->file('imagen')->store('mascotas', 'public');

        $mascota->save();

        // Conexion al dueño de la mascota
        $mascota_cliente = new MascotaCliente();
        $mascota_cliente->id_mascota = $mascota->id;
        $mascota_cliente->rut_cliente = $request->rut_cliente;
        $mascota_cliente->save();


        return redirect()->route('mascotas.index')->with('success', 'Mascota creada de manera exitosa!');
    }

    public function show(Mascota $mascota)
    {
        $citas = Cita::where('id_mascota', $mascota->id)->orderBy('fecha', 'asc')->get();

        return view('mascotas.show', compact(['mascota', 'citas']));
    }


    public function edit(Mascota $mascota){
        return view('mascotas.edit', compact('mascota'));
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
