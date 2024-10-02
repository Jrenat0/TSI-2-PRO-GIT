@extends('templates.master')

@section('title', 'Crear Mascota')


@push('style')
<link rel="stylesheet" href="{{asset('css/mascotas/create.css')}}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 bg-light rounded shadow">
    <div class="row">
        {{-- Formulario para crear una nueva mascota --}}
        <div class="col-12 mb-3 p-3">

            <div class="mb-3">
                <h3>Crear una nueva mascota</h3>
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

            <form action="{{route('mascotas.store')}}" enctype="multipart/form-data" method="POST" id="formCreate">

                @csrf

                <div class="row">

                    <div class="col-12 col-md-6 mb-2">

                        <label class="form-label" for="rut_cliente">Dueño de la mascota</label>
                        <select class="form-select @error('rut_cliente') is-invalid @enderror" id="rut_cliente"
                            name="rut_cliente" value="{{old('rut_cliente')}}" required>
                            <option value="" selected>Seleccione al dueño de la mascota</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut}}">{{$cliente->rut}}:{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                        @error('rut_cliente')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="nombreInput">Nombre de la mascota</label>
                        <input class="form-control @error('nombre') is-invalid @enderror" id="nombreInput" type="text"
                            name="nombre" value="{{old('nombre')}}" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="razaInput">Raza</label>
                        <input class="form-control @error('raza') is-invalid @enderror" id="razaInput" type="text"
                            name="raza" value="{{old('raza')}}" required>
                        @error('raza')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="sexoInput">Sexo</label>
                        <select class="form-select @error('sexo') is-invalid @enderror" id="sexoInput" name="sexo"
                            value="{{old('sexo')}}" required>
                            <option selected>Seleccione el sexo</option>
                            <option value="M">Macho</option>
                            <option value="H">Hembra</option>
                        </select>
                        @error('sexo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="colorInput">Color</label>
                        <input class="form-control @error('color') is-invalid @enderror" id="colorInput" type="text"
                            name="color" value="{{old('color')}}" required>
                        @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="pesoInput">Peso</label>
                        <input class="form-control @error('peso') is-invalid @enderror" id="pesoInput" type="number"
                            name="peso" step="0.01" value="{{old('peso')}}" required>
                        @error('peso')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fecha_nacimientoInput">Fecha de nacimiento</label>
                        <input class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                            id="fecha_nacimientoInput" type="date" name="fecha_nacimiento"
                            value="{{old('fecha_nacimiento')}}" required>
                        @error('fecha_nacimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="imagen">Foto de la mascota</label>
                        <input class="form-control @error('imagen') is-invalid @enderror" id="imagen" type="file"
                            name="imagen" accept="image/*" required>
                        @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-2 text-center">
                        <button type="submit" class="btn btn-outline-primary">Crear Mascota</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- /Formulario para crear una nueva mascota --}}

    </div>
</div>
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush