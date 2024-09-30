<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $usuarios = Usuario::get();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $roles = ['Peluquero', 'Secretario', 'Administrador'];

        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $citas = null;

        if ($usuario->rol == 'Peluquero') {
            $citas = $usuario->citas;
        }


        return view('usuarios.show', compact(['usuario','citas']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $roles = ['Peluquero', 'Secretario', 'Administrador'];

        return view('usuarios.edit',compact(['usuario','roles']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }
    }
}
