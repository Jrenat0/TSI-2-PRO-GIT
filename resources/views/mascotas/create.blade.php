@extends('templates.master')

@section('title', 'Crear Mascota')

@push('styles')
<style>
    body {
        background: linear-gradient(#ffcbe9, #FF5EC0);
        background-position: absolute;
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">

        {{-- Formulario para crear una nueva mascota --}}
        <div class="col-12 mb-3 p-3 border rounded" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">

            <div class="mb-3">
                <h3>Crear una nueva mascota</h3>
            </div>

            <form action="{{route('mascotas.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="rut_cliente">Dueño de la mascota</label>
                        <select class="form-select" id="rut_cliente" name="rut_cliente" required>
                            <option value="" selected>Seleccione al dueño de la mascota</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut}}">{{$cliente->rut}}:{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="nombre">Nombre de la mascota</label>
                        <input class="form-control" id="nombre" type="text" name="nombre" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="raza">Raza</label>
                        <input class="form-control" id="raza" type="text" name="raza" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="sexo">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option selected>Seleccione el sexo</option>
                            <option value="M">Macho</option>
                            <option value="H">Hembra</option>
                        </select>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="color">Color</label>
                        <input class="form-control" id="color" type="text" name="color" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="peso">Peso</label>
                        <input class="form-control" id="peso" type="number" name="peso" step="0.01" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input class="form-control" id="fecha_nacimiento" type="date" name="fecha_nacimiento" required>
                    </div>

                    <div class="col-12 mb-2">
                        <button type="submit" class="btn btn-primary">Crear Mascota</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- /Formulario para crear una nueva mascota --}}

    </div>
</div>

@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush