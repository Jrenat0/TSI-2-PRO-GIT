<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;

class UsuariosController extends Controller
{

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


    public function store(UsuarioRequest $request)
    {

        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $usuario = Usuario::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Se ha creado el nuevo usuario!');

    }


    public function show(Usuario $usuario)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $citas = null;

        if ($usuario->rol == 'Peluquero') {
            $citas = $usuario->citas;
        }


        return view('usuarios.show', compact(['usuario', 'citas']));
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

        return view('usuarios.edit', compact(['usuario', 'roles']));

    }


    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        $usuario->update($request->validated());

        return redirect()->route('usuarios.index')->with('success', 'Se ha modificado al usuario con exito!');

    }



    public function destroy(Usuario $usuario)
    {
        if (Gate::denies('admin-gestion')) {
            return redirect()->route('home.index');
        }

        if ($usuario->rol !== 'Peluquero' && $usuario->rut !== Auth::user()->rut) {
            try {
                $usuario->delete();
                return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar al usuario.');
            }
        } else {
            // Validar que el peluquero no le queden citas pendientes.
            // En ese hipotetico caso, no permitir que se elimine al peluquero.
            if ($usuario->rol == 'Peluquero') {

                $pendientes = false;

                foreach ($usuario->citas as $cita) {
                    if ($cita->estado == 'P') {
                        $pendientes = true;
                    }
                }

                if ($pendientes) {
                    return redirect()->back()->with('warning', 'Este Peluquero tiene citas pendientes!!');
                } else {
                    try {
                        $usuario->delete();
                        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar al usuario.');
                    }
                }


            } else {
                return redirect()->back()->with('warning', 'No tienes permiso para eliminar este usuario.');
            }

        }

    }
}
