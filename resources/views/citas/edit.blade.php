@extends('templates.master')

@section('title', 'Editando informacion de una Cita')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">
        <form method="POST" action="{{ route('citas.update', $cita) }}">

            @csrf

            @method('PUT')

            <h4 class="fw-bold">Editando cita para el {{ $cita->fecha }} a las {{ $cita->hora }} hrs</h4>

            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control mb-2" id="fecha" name="fecha" value="{{ old('fecha', $cita->fecha) }}">

            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control mb-2" id="hora" name="hora" value="{{ old('hora', $cita->hora) }}">

            <div class="row">
                <div class="col-6">
                    <label for="id_mascota" class="form-label">Mascota atendida</label>
                    <select class="form-select mb-2" name="id_mascota" id="id_mascota">
                        @foreach ($mascotas as $mascota)
                            <option value="{{ $mascota->id }}" @selected($mascota->id === $cita->mascota->id)>Nombre: {{ $mascota->nombre }},
                                Raza:
                                {{ $mascota->raza }}.</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6">
                    <label for="estado" class="form-label">Estado de la cita</label>
                    <select class="form-select mb-2" name="estado" id="estado">
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
                                            @checked(in_array($servicio->id, $cita->servicios->pluck('id')->toArray()))>
                                        <label for="servicio{{ $servicio->id }}"
                                            class="form-label">{{ $servicio->nombre }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <select class="form-select form-select-sm mb-2" name="rut_usuario{{ $servicio->id }}"
                                        id="rut_usuario{{ $servicio->id }}">
                                        <option value="" disabled selected>Peluquero para {{ $servicio->nombre }}
                                        </option>

                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->rut }}" @selected($cita->detalle_cita->where('id_cita', $cita->id)->where('id_servicio', $servicio->id)->where('rut_usuario', $usuario->rut)->isNotEmpty())>
                                                {{ $usuario->nombre }} (RUT: {{ $usuario->rut }})
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
                        placeholder="Ingrese sus observaciones para el encargado" value="{{ old('observaciones', $cita->observaciones) }}">{{ $cita->observaciones }}</textarea>
                </div>

                <button class="btn w-100" id="buttonEdit" type="submit"
                    onclick="return confirm('Si desea cambiar el estado de la cita a Terminada, La cita ya no podrá ser modificada ni eliminada. ¿Desea proceder con los cambios ?')">Confirmar
                    Cambios</button>

            </div>
        </form>

    </div>

    <div class="container-fluid col-lg-10 col-12 p-0">

        <div class="col-12 mb-3">
            <button class="btn" type="submit" id="buttonDelete" data-bs-toggle="modal"
                data-bs-target="#borrarCitaModal">
                <h2><i class="fa-solid fa-trash"></i>Eliminar Cita</h2>
            </button>
        </div>

        <div class="container-fluid col-lg-10 col-12 shadow p-0">
            <div class="modal fade" id="borrarCitaModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar permanentemente la cita de <strong>{{ $cita->mascota->nombre }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>

                            <form action="{{ route('citas.destroy', $cita) }}" method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
