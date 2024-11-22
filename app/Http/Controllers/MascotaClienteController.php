<?php

namespace App\Http\Controllers;

use App\Models\MascotaCliente;
use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Mascota $mascota)
    {


        $mascota_cliente = new MascotaCliente;

        $mascota_cliente->id_mascota = $mascota->id;
        $mascota_cliente->rut_cliente = $request->rut_cliente;

        $mascota_cliente->save();

        return redirect()->route("mascotas.show",$mascota)->with("success","");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
