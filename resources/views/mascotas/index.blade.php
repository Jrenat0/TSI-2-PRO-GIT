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
    {{-- Botón para ir a la vista create --}}
    <div class="col-12 mb-3 text-end">
        <a href="{{route('mascotas.create')}}" class="btn btn-primary">Agregar Nueva Mascota</a>
    </div>
    {{-- /Botón para ir a la vista create --}}
    <div class="row">

        {{-- Form para consultar una mascota --}}
        <div class="col-12 mb-3 p-3 border rounded" id="formEditarMascota" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">

            <div class="mb-3">
                <h3>Consultar por una mascota</h3>
            </div>
            
            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="clientesSelect">Dueño de la mascota</label>
                        <select class="form-select" id="clientesSelect">
                            <option selected>Seleccione al dueño de la mascota</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut}}">{{$cliente->rut}}:{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="mascotasSelect">Mascota</label>
                        <select class="form-select" id="mascotasSelect">
                        </select>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="razaInput">Raza</label>
                        <input class="form-control" id="razaInput" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="sexoInput">Sexo</label>
                        <input class="form-control" id="sexoInput" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="colorInput">Color</label>
                        <input class="form-control" id="colorInput" type="text" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="pesoInput">Peso</label>
                        <input class="form-control" id="pesoInput" type="number" readonly>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fecha_nacimientoInput">Fecha de nacimiento</label>
                        <input class="form-control" id="fecha_nacimientoInput" type="date" readonly>
                    </div>

                    <div class="col-12 m-2 text-end" id="gestionarButton"></div>
                </div>
            </form>
        </div>
        {{-- /Form para consultar una mascota --}}

         
        
        {{-- Mascotas Nuevas --}}

        <div class="col-12 mb-3">
            <h3 class="">Mascotas Nuevas</h3>
        </div>

        @foreach($mascotas as $mascota)
        <div class="col-12 col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center mt-2">
            <div class="card" style="width: 18rem;">
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
                    <a href="{{route('mascotas.show',$mascota)}}" class="btn btn-outline-primary">Gestionar</a>
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