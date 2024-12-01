@extends('templates.master')

@section('title', 'Crear Cliente')


@push('style')
<link rel="stylesheet" href="{{ asset('css/clientes/edit.css') }}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 bg-light rounded shadow">
    <div class="row">
        {{-- Formulario para crear un nuevo cliente --}}
        <div class="col-12 mb-3 p-3">

            <div class="mb-3">
                <h3>Crear un nuevo servicio</h3>
            </div>

            {{-- Mostrar mensajes de error si hay problemas de validación --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('servicios.store')}}"  method="POST" id="formCreate">

                @csrf

                <div class="row">
                    <div class="col-12  mb-2">
                        <label class="form-label" for="nombre">Nombre del servicio</label>
                        <input class="form-control @error('nombre') is-invalid @enderror" id="nombre" type="text"
                            name="nombre" value="{{old('nombre')}}" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="descripcion">Descripcion</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" placeholder="Ingrese la descripcion del servicio" id="descripcion" name="descripcion" value="{{old('descripcion')}}"></textarea>
                            @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="duracion_estimada">Duracion estimada (en minutos)</label>
                        <input class="form-control @error('duracion_estimada') is-invalid @enderror" id="duracion_estimada" type="text"
                            name="duracion_estimada" value="{{old('duracion_estimada')}}" required>
                        @error('duracion_estimada')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="costo">Costo</label>
                        <input class="form-control @error('costo') is-invalid @enderror" id="costo" type="text"
                            name="costo" value="{{old('costo')}}" required>
                        @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-2 text-center">
                        <button type="submit" class="btn btn-outline-primary">Crear Servicio</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Formulario para crear un nuevo cliente --}}

    </div>
</div>
@endsection