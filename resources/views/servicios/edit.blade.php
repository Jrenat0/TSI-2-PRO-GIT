@extends('templates.master')

@section('title', 'Mostrando informacion')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/edit.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border-0 shadow rounded mt-2 mb-4">
        <form action="{{ route('servicios.update', $servicio) }}" method="POST">
            @csrf

            @method('put')

            <h4 class="fw-bold">Editando "{{ $servicio->nombre }}" (Servicio)</h4>

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control mb-2 @error('nombre') is-invalid @enderror" id="nombre"
                name="nombre" value="{{ old('nombre', $servicio->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control mb-2 @error('descripcion') is-invalid @enderror" id="descripcion"
                name="descripcion" value="{{ old('descripcion', $servicio->descripcion) }}" required>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="duracion_estimada" class="form-label">Duracion estimada (En minutos)</label>
            <input type="number" class="form-control mb-2 @error('duracion_estimada') is-invalid @enderror"
                id="duracion_estimada" name="duracion_estimada" step="0.1"
                value="{{ old('duracion_estimada', $servicio->duracion_estimada) }}" required>
            @error('duracion_estimada')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror


            <label for="costo" class="form-label">Costo del servicio</label>
            <div class="input-group mb-4">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="costo" name="costo" step="0.1"
                    value="{{ $servicio->costo }}" required>
            </div>

            <button class="btn w-100" id="buttonEdit" type="submit">Confirmar Cambios</button>

        </form>
    </div>


    <div class="container-fluid col-lg-10 col-12 p-0">

        <div class="col-12 mb-3">
            <button class="btn" type="submit" id="buttonDelete" data-bs-toggle="modal"
                data-bs-target="#borrarServicioModal">
                <h2><i class="fa-solid fa-trash"></i>Eliminar Servicio</h2>
            </button>
        </div>

        <div class="container-fluid col-lg-10 col-12 shadow p-0">
            <div class="modal fade" id="borrarServicioModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar permanentemente a <strong>{{ $servicio->nombre }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>

                            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" id="formDelete">
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
