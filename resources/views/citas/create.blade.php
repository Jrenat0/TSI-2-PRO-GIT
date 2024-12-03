@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">
        <form action="{{ route('citas.store') }}" method="POST" class="mb-2">

            @csrf
            <h4 class="fw-bold">Ingresar una nueva cita</h4>

            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control mb-2" id="fecha" name="fecha" value="{{ $fecha }}">

            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control mb-2" id="hora" name="hora">

            <label for="id_mascota" class="form-label">Mascota atendida</label>
            <select class="form-control mb-2" name="id_mascota" id="id_mascota">
                @foreach ($mascotas as $mascota)
                    <option value="{{ $mascota->id }}">Nombre: {{ $mascota->nombre }}; Raza: {{ $mascota->raza }}</option>
                @endforeach
            </select>

            <div class="row">
                <div class="col-12">
                    <label for="id_servicio" class="form-label">Servicios Requeridos</label>
                    <div class="border px-3 py-2 rounded mb-3">
                        <div class="row">
                            @foreach ($servicios as $servicio)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}"
                                            name="id_servicio[]" id="servicio{{ $servicio->id }}">
                                        <label for="servicio{{ $servicio->id }}"
                                            class="form-label">{{ $servicio->nombre }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <select class="form-select form-select-sm mb-2" name="rut_usuario{{$servicio->id}}" id="rut_usuario{{$servicio->id}}">
                                        <option value="" disabled selected>Peluquero para {{$servicio->nombre}}</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->rut }}">Nombre: {{ $usuario->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control mb-3" id="observaciones" rows="6" name="observaciones"
                        placeholder="Ingrese sus observaciones para el encargado"></textarea>
                </div>
            </div>

            <button class="btn w-100" id="buttonEdit" type="submit">Ingresar Cita</button>
        </form>

    </div>

@endsection
