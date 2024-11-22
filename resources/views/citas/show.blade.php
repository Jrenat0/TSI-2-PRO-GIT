@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">

        <h4 class="fw-bold">Informacion de Cita {{ $cita->id }}</h4>

        <label for="id" class="form-label">Id de la cita</label>
        <input type="text" class="form-control mb-2" id="id" name="id" value="{{ $cita->id }}" readonly>

        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control mb-2" id="fecha" name="fecha" value="{{ $cita->fecha }}" readonly>

        <label for="hora" class="form-label">Hora</label>
        <input type="time" class="form-control mb-2" id="hora" name="hora" value="{{ $cita->hora }}" readonly>

        <label for="pesaje" class="form-label">Pesaje</label>
        <input type="number" class="form-control mb-2" id="pesaje" name="pesaje" step="0.1"
            value="{{ $cita->pesaje }}" readonly>

        <label for="observaciones" class="form-label">Observaciones</label>
        <input type="text" class="form-control mb-2" id="observaciones" name="observaciones"
            value="{{ $cita->observaciones }}" readonly>

        <label for="estado" class="form-label">Estado de la cita</label>
        <input type="text" class="form-control mb-2" id="estado" name="estado" value="{{ $cita->estado }}" readonly>

        <label for="mascota" class="form-label">Mascota atendida</label>
        <input type="text" class="form-control mb-2" id="mascota" name="mascota" value="{{ $cita->mascota->nombre }}"
            readonly>

        <label for="cliente" class="form-label">Dueño de la mascota</label>
        <select class="form-select mb-3" aria-label="Seleccionar cliente para agregar como dueño" name="cliente" readonly>
            @foreach ($cita->mascota->clientes as $cliente)
                <option value="{{ $cliente->rut }}">{{ $cliente->nombre }}</option>
            @endforeach
        </select>

        <form action="" method="GET" class="mb-2">
            <button class="btn w-100" id="buttonEdit" type="submit">Editar Cita {{ $cita->id }}</button>
        </form>

    </div>

@endsection
