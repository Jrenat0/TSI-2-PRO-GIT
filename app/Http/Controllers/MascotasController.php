<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaRequest;
use App\Models\MascotaCliente;

use Illuminate\Support\Facades\DB;

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
        $mascota->clientes()->attach($request->rut_cliente);


        return redirect()->route('mascotas.index')->with('success', 'Mascota creada de manera exitosa!');
    }

    public function show(Mascota $mascota)
    {
        $citas = Cita::where('id_mascota', $mascota->id)->orderBy('fecha', 'asc')->get();

        $idMascota = $mascota->id;

        // Crea una coleccion con todos los clientes que NO se encuentran ligados a la mascota, o sea que no son dueños de ella.
        $clientes = Cliente::get();

        $clientesnoligados = [];

        foreach($clientes as $cliente)
        {
            $relacion = MascotaCliente::findByComposite($mascota->id, $cliente->rut);
            if ($relacion === null){
                $clientesnoligados[] = $cliente;
            }
        }


        return view('mascotas.show', compact(['mascota', 'citas', 'clientesnoligados']));
    }


    public function edit(Mascota $mascota)
    {
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
