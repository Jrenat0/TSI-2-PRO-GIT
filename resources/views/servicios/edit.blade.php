@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
<link rel="stylesheet" href="{{ asset('css/servicios/edit.css') }}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded mt-2 mb-4">
    <form action="{{route('servicios.update', $servicio)}}" method="POST">
        @csrf

        @method('put')

        <h4 class="fw-bold">Editando "{{$servicio->nombre}}" (Servicio)</h4>

        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control mb-2" id="nombre" name="nombre" value="{{$servicio->nombre}}" required>

        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control mb-2" id="descripcion" name="descripcion"
            value="{{$servicio->descripcion}}" required>

        <label for="duracion_estimada" class="form-label">Duracion estimada (En minutos)</label>
        <input type="number" class="form-control mb-2" id="duracion_estimada" name="duracion_estimada" step="0.1"
            value="{{$servicio->duracion_estimada}}" required>

        <label for="costo" class="form-label">Costo del servicio</label>
        <div class="input-group mb-4">
            <span class="input-group-text">$</span>
            <input type="number" class="form-control" id="costo" name="costo" step="0.1" value="{{ $servicio->costo }}"
                required>
        </div>

        <button class="btn w-100" id="buttonEdit" type="submit">Confirmar Cambios</button>

    </form>
</div>


<div class="container-fluid col-lg-10 col-12 p-0">
    <form action="{{route('servicios.destroy',$servicio)}}" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
        <div class="row">
            <div class="col-12">
                <button class="btn" type="submit" id="buttonDelete">
                    <h2><i class="fa-solid fa-trash"></i>Eliminar a <strong>{{$servicio->nombre}}</strong></h2>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection