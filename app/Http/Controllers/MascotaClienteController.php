<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Cliente;

class MascotaClienteController extends Controller
{

    public function store(Request $request)
    {
        $mascota = Mascota::where("id", $request->id_mascota)->first();

        $mascota->clientes()->attach($request->rut_cliente);

        return redirect()->back()->with("success","");
    }

    public function destroy(Request $request)
    {
        $mascota = Mascota::where("id", $request->id_mascota)->first();

        $mascota->clientes()->detach($request->rut_cliente);

        return redirect()->back()->with("success","");
    }

    public function destroy2(Request $request, Mascota $mascota)
{
    $mascota->clientes()->detach($request->rut_cliente);
    // Redireccionar con un mensaje de éxito
    return redirect()->back()->with('success', 'La mascota ha sido desligada del cliente con éxito.');
}

}
