@extends('templates.master')

@section('title', 'Editando una Cita')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded my-2">
        <form action="{{ route('citas.update', $cita->id) }}" method="POST" class="mb-2">
            @csrf
            @method('PUT')
            <h4 class="fw-bold">Editando cita para el {{$cita->fecha}} a las {{$cita->hora}} hrs.</h4>

            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control mb-2" id="fecha" name="fecha" value="{{$cita->fecha}}">

            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control mb-2" id="hora" name="hora" value="{{$cita->hora}}">

            <label for="id_mascota" class="form-label">Mascota atendida</label>
            <select class="form-control mb-2" name="id_mascota" id="id_mascota">
                @foreach ($mascotas as $mascota)
                    <option value="{{ $mascota->id }}" @if($cita->id_mascota === $mascota->id) selected @endif>Nombre: {{ $mascota->nombre }}; Raza: {{ $mascota->raza }}</option>
                @endforeach
            </select>

            <label for="rut_usuario" class="form-label">Encargado de la cita</label>
            <select class="form-control mb-2" name="rut_usuario" id="rut_usuario">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->rut }}" @if($cita->rut_usuario === $usuario->rut) selected @endif>{{ $usuario->nombre }}</option>
                @endforeach
            </select>


            <div class="row">
                <div class="col-3">
                    <label for="id_servicio" class="form-label">Servicios Requeridos</label>
                    <div class="border px-3 py-2 rounded mb-3">
                        @foreach ($servicios as $servicio)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $servicio->id }}"
                                    name="id_servicio[]" id="servicio{{ $servicio->id }}">
                                <label for="servicio{{ $servicio->id }}" class="form-label">{{ $servicio->nombre }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-9">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control mb-3" id="observaciones" rows="6" name="observaciones"
                        >{{$cita->observaciones}}</textarea>

                        {{-- placeholder="Ingrese sus observaciones para el encargado" --}}
                </div>
            </div>

            <button class="btn w-100" id="buttonEdit" type="submit">Confrimar Cambios</button>
        </form>

    </div>

    <div class="container-fluid col-lg-10 col-12 p-0">
        {{-- <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" id="formDelete">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-12"> --}}
                    <button class="btn" type="submit" id="buttonDelete"  data-bs-toggle="modal" data-bs-target="#borrarModal">
                        <h2><i class="fa-solid fa-trash"></i>Cancelar la cita de <strong>{{ $cita->mascota->nombre }}</strong></h2>
                    </button>
                {{-- </div>
            </div>
        </form> --}}
        <div class="modal fade" id="borrarModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea eliminar permanentemente la cita N° {{$cita->id}}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
    
                        <form action="{{ route('citas.destroy', $cita->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
