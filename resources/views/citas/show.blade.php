@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">
        <div class="mb-2">
            <h4 class="fw-bold">Informacion de la cita para el {{ $cita->fecha }} a las {{ $cita->hora }} hrs</h4>

            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control mb-2" id="fecha" name="fecha" value="{{ $cita->fecha }}" disabled>

            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control mb-2" id="hora" name="hora" value="{{ $cita->hora }}"
                disabled>


            <div class="row">
                <div class="col-6">
                    <label for="id_mascota" class="form-label">Mascota atendida</label>
                    <select class="form-select mb-2" name="id_mascota" id="id_mascota" disabled>
                        <option value="{{ $cita->mascota->id }}">Nombre: {{ $cita->mascota->nombre }}; Raza:
                            {{ $cita->mascota->raza }}</option>
                    </select>
                </div>

                <div class="col-6">
                    <label for="estado" class="form-label">Estado de la cita</label>
                    <select class="form-select mb-2" name="estado" id="estado" disabled>
                        <option value="P" @selected($cita->estado === 'P')>Pendiente</option>
                        <option value="T" @selected($cita->estado === 'T')>Terminada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="id_servicio" class="form-label">Servicios Requeridos</label>
                    <div class="border px-3 py-2 rounded mb-3">
                        <div class="row">
                            @foreach ($servicios as $servicio)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}"
                                            name="id_servicio[]" id="servicio{{ $servicio->id }}"
                                            @checked(in_array($servicio->id, $cita->servicios->pluck('id')->toArray())) disabled>
                                        <label for="servicio{{ $servicio->id }}"
                                            class="form-label">{{ $servicio->nombre }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <select class="form-select form-select-sm mb-2" name="rut_usuario{{ $servicio->id }}"
                                        id="rut_usuario{{ $servicio->id }}" disabled>
                                        <option value="" disabled selected>Sin Peluquero para {{ $servicio->nombre }}
                                        </option>

                                        @foreach ($cita->detalle_cita->where('id_servicio', $servicio->id)->where('id_cita', $cita->id) as $detalle)
                                            <option value="{{ $detalle->rut_usuario }}" selected>
                                                {{ $detalle->usuario->nombre ?? 'Sin nombre' }} (RUT:
                                                {{ $detalle->rut_usuario }})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control mb-3" id="observaciones" rows="6" name="observaciones"
                        placeholder="Ingrese sus observaciones para el encargado" disabled>{{ $cita->observaciones }}</textarea>
                </div>


                <form action="{{ route('citas.edit', $cita) }}" method="GET">
                    <button class="btn w-100" id="buttonEdit" type="submit">Editar la Cita {{ $cita->id }}</button>
                </form>
            </div>
        </div>

    </div>

@endsection
