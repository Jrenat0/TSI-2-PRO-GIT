@extends('templates.master')

@section('title', 'Mascotas')


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

        {{-- Form para consultar una mascota --}}
        <div class="col-12 mb-3 p-3 border rounded" id="formConsultarMascota" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">

            <div class="mb-3">
                <h3>Consultar por una mascota</h3>
            </div>
            
            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="rut_cliente">Dueño de la mascota</label>
                        <select class="form-select" id="rut_cliente">
                            <option selected>Seleccione al dueño de la mascota</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut}}">{{$cliente->rut}}:{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="id">Mascota</label>
                        <select class="form-select" id="id">
                        </select>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="raza">Raza</label>
                        <input class="form-control" id="raza" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="sexo">Sexo</label>
                        <input class="form-control" id="sexo" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="color">Color</label>
                        <input class="form-control" id="color" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="peso">Peso</label>
                        <input class="form-control" id="peso" type="number" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input class="form-control" id="fecha_nacimiento" type="date" readonly>
                    </div>

                    <div class="col-12 mb-2" id="gestionarButton"></div>
                </div>
            </form>
        </div>
        {{-- /Form para consultar una mascota --}}

         {{-- Botón para ir a la vista create --}}
         <div class="col-12 mb-3">
            <a href="{{route('mascotas.create')}}" class="btn btn-success">Agregar Nueva Mascota</a>
        </div>
        {{-- /Botón para ir a la vista create --}}
        
        {{-- Mascotas Nuevas --}}

        <div class="col-12 mb-3">
            <h3 class="">Mascotas Nuevas</h3>
        </div>

        @foreach($mascotas as $mascota)
        <div class="col-12 col-md-3 my-3">
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">
                    <h5 class="card-title">{{$mascota->nombre}}</h5>
                    <p class="card-text">
                        <strong>Raza: </strong>{{$mascota->raza}} <br>
                        <strong>Sexo: </strong>{{$mascota->sexo}} <br>
                        <strong>Color: </strong>{{$mascota->color}} <br>
                        <strong>Peso: </strong>{{$mascota->peso}} kg. <br>
                        <strong>Nacimiento: </strong>{{$mascota->fecha_nacimiento}} <br>
                        <strong>Dueño: </strong>{{$mascota->cliente->nombre}}
                    </p>
                    <a href="{{route('mascotas.show',$mascota)}}" class="btn btn-primary">Gestionar</a>
                </div>
            </div>
        </div>
        @endforeach
        {{-- /Mascotas Nuevas --}}


    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('/js/mascotas.js')}}"></script>
@endpush