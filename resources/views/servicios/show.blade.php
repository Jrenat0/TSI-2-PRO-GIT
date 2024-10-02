@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
<link rel="stylesheet" href="{{ asset('css/servicios/show.css') }}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">

    <h4 class="fw-bold">Informacion de {{$servicio->nombre}}</h4>

    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control mb-2" id="nombre" name="nombre" value="{{$servicio->nombre}}" readonly>

    <label for="descripcion" class="form-label">Descripcion</label>
    <input type="text" class="form-control mb-2" id="descripcion" name="descripcion" value="{{$servicio->descripcion}}"
        readonly>

    <label for="duracion_estimada" class="form-label">Duracion estimada (En minutos)</label>
    <input type="number" class="form-control mb-2" id="duracion_estimada" name="duracion_estimada" step="0.1"
        value="{{$servicio->duracion_estimada}}" readonly>

    <label for="costo" class="form-label">Costo del servicio</label>
    <div class="input-group mb-4">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="costo" name="costo" step="0.1" value="{{ $servicio->costo }}"
            readonly>
    </div>



    <form action="{{ route('servicios.edit', $servicio)}}" method="GET">
        <button class="btn w-100" id="buttonEdit" type="submit">Editar a {{$servicio->nombre}}</button>
    </form>

</div>

@endsection