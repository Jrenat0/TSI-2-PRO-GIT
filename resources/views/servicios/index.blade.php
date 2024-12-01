@extends('templates.master')

@section('title', 'Servicios')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">
@endpush

@section('content')

    <div class="container-fluid col-lg-10 col-12 px-0">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="container-fluid col-lg-10 col-12 rounded p-4" style="background: rgba(255, 255, 255, 0.8)">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="text-center fw-bold">Servicios Disponibles</h1>
            </div>
            @foreach ($servicios as $servicio)
                <div class="col-lg-4 col-12 mb-3">
                    <a href="" class="text-decoration-none" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $servicio->id }}">
                        <div class="card w-100 border-0 shadow">
                            <div class="card-body">
                                <h2 class="card-title text-center fw-bold">{{ $servicio->nombre }}</h2>
                                <p class="card-text text-center">{{ $servicio->descripcion }}</p>
                            </div>
                        </div>
                    </a>

                    <div class="modal fade" id="modal{{ $servicio->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4 fw-bold">Informacion de {{ $servicio->nombre }} (Servicio)
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control mb-2" id="nombre" name="nombre"
                                        value="{{ $servicio->nombre }}" readonly>

                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control mb-2" id="descripcion" name="descripcion"
                                        value="{{ $servicio->descripcion }}" readonly>

                                    <label for="duracion_estimada" class="form-label">Duracion estimada (En minutos)</label>
                                    <input type="number" class="form-control mb-2" id="duracion_estimada"
                                        name="duracion_estimada" step="0.1" value="{{ $servicio->duracion_estimada }}"
                                        readonly>

                                    <label for="costo" class="form-label">Costo del servicio</label>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="costo" name="costo"
                                            step="0.1" value="{{ $servicio->costo }}" readonly>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('servicios.edit', $servicio) }}" method="GET">
                                        <button class="btn" id="buttonEdit" type="submit">Editar a
                                            {{ $servicio->nombre }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('servicios.create') }}" class="text-decoration-none">
                <div class="card w-100 border-0 shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center fw-bold"><i class="fa-solid fa-plus"></i></h2>
                        <p class="card-text text-center"><em>Agregar nuevo servicio</em></p>
                    </div>
                </div>
            </a>



        </div>
    </div>
@endsection
