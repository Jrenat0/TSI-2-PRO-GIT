@extends('templates.master')

@section('title', 'Mascotas')

@push('style')
    <link rel="stylesheet" href="{{asset('css/mascotas/index.css')}}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12">
    {{-- Botón para ir a la vista create --}}
    <div class="col-12 mb-3 text-end">
        <a href="{{route('mascotas.create')}}" class="btn" id="addButton">Agregar Nueva Mascota</a>
    </div>
    {{-- /Botón para ir a la vista create --}}
    <div class="row">

        {{-- Form para consultar una mascota --}}
        <div class="col-12 mb-3 p-3 bg-light rounded" id="formEditarMascota">

            <div class="mb-3">
                <h3>Consultar por una mascota</h3>
            </div>

            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6 mb-2">
                        <label class="form-label" for="clientesSelect">Dueño de la mascota</label>
                        <select class="form-select" id="clientesSelect">
                            <option selected>Seleccione al dueño de la mascota</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->rut}}">{{$cliente->rut}}:{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-lg-6 mb-2">
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
        <div class="container-fluid bg-light rounded py-3">

            <h3>Mascotas Nuevas</h3>

            <div class="row">
                @foreach($mascotas as $mascota)
                <div class="col-12 col-lg-6 col-xxl-3 d-flex justify-content-center mb-3">
                    <div class="card border-0 shadow w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$mascota->nombre}}</h5>
                            <p class="card-text">
                                <strong>Raza: </strong>{{$mascota->raza}} <br>
                                <strong>Sexo: </strong>{{$mascota->sexo}} <br>
                                <strong>Color: </strong>{{$mascota->color}} <br>
                                <strong>Peso: </strong>{{$mascota->peso}} kg. <br>
                                <strong>Nacimiento: </strong>{{$mascota->fecha_nacimiento}} <br>
                                <strong>Dueño: </strong>
                                @foreach($mascota->mascota_cliente as $mascota_cliente)
                                {{$mascota_cliente->cliente->nombre}}{{ $loop->last ? '.' : ',' }}
                                @endforeach    
                            </p>
                            <a href="{{route('mascotas.show',$mascota)}}" class="btn" id="gestionButton">Gestionar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>



        {{-- /Mascotas Nuevas --}}


    </div>
</div>
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('/js/mascotas.js')}}"></script>
@endpush