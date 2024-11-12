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
                <h3>Crear un nuevo cliente</h3>
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

            <form action="{{route('clientes.store')}}" enctype="multipart/form-data" method="POST" id="formCreate">

                @csrf

                <div class="row">

                    <div class="col-12 mb-2">
                        <label class="form-label" for="rut">Rut del cliente</label>
                        <input class="form-control @error('rut') is-invalid @enderror" id="rut" type="text"
                            name="rut" value="{{old('rut')}}" required>
                        @error('rut')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12  mb-2">
                        <label class="form-label" for="nombre">Nombre del cliente</label>
                        <input class="form-control @error('nombre') is-invalid @enderror" id="nombre" type="text"
                            name="nombre" value="{{old('nombre')}}" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fono">Telefono</label>
                        <input class="form-control @error('fono') is-invalid @enderror" id="fono" type="text"
                            name="fono" value="{{old('fono')}}" required>
                        @error('fono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text"
                            name="email" value="{{old('email')}}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="direccion">Direccion</label>
                        <input class="form-control @error('direccion') is-invalid @enderror" id="direccion" type="text"
                            name="direccion" value="{{old('direccion')}}" required>
                        @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-2 text-center">
                        <button type="submit" class="btn btn-outline-primary">Crear Mascota</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- Formulario para crear un nuevo cliente --}}

    </div>
</div>
@endsection