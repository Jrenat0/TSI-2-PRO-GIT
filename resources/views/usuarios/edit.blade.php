@extends('templates.master')


@section('title', 'Editando a un usuario')

@push('style')
<link rel="stylesheet" href="{{ asset('css/clientes/edit.css') }}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 mb-5 bg-light rounded">

    <form action="{{route('usuarios.update', $usuario)}}" method="POST" id="formEdit">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-12 col-6 mt-2 mb-3">
                <h2 class="text-center fw-bold">Editando a {{$usuario->nombre}} | {{$usuario->rol}}</h2>
            </div>

            <div class="col-12 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$usuario->nombre}}"
                    placeholder="Ingrese el nombre" required readonly>
            </div>

            <div class="col-12 mb-3">
                <label for="rut" class="form-label">Rut</label>
                <input type="text" class="form-control" id="rut" name="rut" value="{{$usuario->rut}}"
                    placeholder="Ingrese el rut" required readonly>
            </div>

            <div class="col-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}"
                    placeholder="example@mail.cl" required>
            </div>

            <div class="col-12 mb-3">
                <label for="fono" class="form-label">Fono</label>
                <input type="text" class="form-control" id="fono" name="fono" value="{{$usuario->fono}}"
                    placeholder="Ingrese el teléfono" required>
            </div>

            <div class="col-12 mb-2">
                <label class="form-label" for="rol">Rol</label>
                <select name="rol" id="rol" class="form-select" required>
                    @foreach($roles as $rol)
                    <option value="{{$rol}}" @if($usuario->rol == $rol) selected @endif >{{$rol}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 mb-1">
                <button class="btn w-100" type="submit" id="confirmar">Confirmar Cambios</button>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid col-lg-10 col-12 p-0">
    <form action="{{route('usuarios.destroy',$usuario)}}" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
        <div class="row">
            <div class="col-12">
                <button class="btn" type="submit">
                    <h2><i class="fa-solid fa-trash"></i>Eliminar a <strong>{{$usuario->nombre}}</strong></h2>
                </button>
            </div>
        </div>
    </form>
</div>

@endsection