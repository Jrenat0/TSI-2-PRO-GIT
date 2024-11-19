@extends('templates.master')


@section('title', 'Informacion de un cliente')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/clientes/show.css') }}">
@endpush

@section('content')

    <div class="container-fluid col-lg-10 col-12 bg-white shadow rounded py-2 mb-3" id="infoContainer">
        <a href="#collapseInfo" data-bs-toggle="collapse" id="collapseInfoToggler">
            <i class="fa-solid fa-caret-down" id="infoIcon"></i>Informacion del cliente</a>


        <div class="collapse show" id="collapseInfo">
            <div class="container-fluid bg-white px-3 py-2 border rounded my-2">
                <!-- Name Label -->
                <label for="nombre" class="form-label">Nombre</label>
                <!-- Name Input -->
                <input type="text" class="form-control mb-2" id="nombre" name="nombre" value="{{ $cliente->nombre }}"
                    readonly>

                <!-- Rut Label -->
                <label for="rut" class="form-label">Rut</label>
                <!-- Rut Input -->
                <input type="text" class="form-control mb-2" id="rut" name="rut" value="{{ $cliente->rut }}"
                    readonly>

                <!-- Email Label -->
                <label for="email" class="form-label">Email</label>
                <!-- Email Input -->
                <input type="email" class="form-control mb-2" id="email" name="email" value="{{ $cliente->email }}"
                    readonly>

                <!-- Fono Label -->
                <label for="fono" class="form-label">Fono</label>
                <!-- Fono Input -->
                <input type="number" class="form-control mb-2" id="fono" name="fono" value="{{ $cliente->fono }}"
                    readonly>

                <!-- Direccion Label -->
                <label for="direccion" class="form-label">Dirección</label>
                <!-- Direccion Input -->
                <input type="text" class="form-control mb-2" id="direccion" name="direccion"
                    value="{{ $cliente->direccion }}" readonly>

                <form action="{{ route('clientes.edit', $cliente) }}" method="GET">
                    <button class="btn w-100" id="buttonEdit" type="submit">Editar a {{ $cliente->nombre }}</button>
                </form>

            </div>

        </div>
    </div>

    <div class="container-fluid col-lg-10 col-12 bg-white shadow rounded py-2 mb-3" id="petsContainer">
        <a href="#collapsePets" data-bs-toggle="collapse" id="collapsePetsToggler">
            <i class="fa-solid fa-caret-down" id="petsIcon"></i>Mascotas del cliente</a>


        <div class="collapse" id="collapsePets">
            <div class="table-responsive">
                <table class="table table-hover mt-2">
                    <!-- Table head -->
                    <thead>
                        <!-- Head labels -->
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Color</th>
                        <th>Peso</th>
                        <th>Fecha de nacimiento</th>
                        <th>Desligar</th>
                    </thead>

                    <!-- Table body -->
                    <tbody>
                        @foreach ($cliente->mascotas as $mascota)
                            <tr>
                                <td>{{ $mascota->nombre }}</td>
                                <td>{{ $mascota->raza }}</td>
                                <td>{{ $mascota->sexo }}</td>
                                <td>{{ $mascota->color }}</td>
                                <td>{{ $mascota->peso }}</td>
                                <td>{{ $mascota->fecha_nacimiento }}</td>
                                <td>
                                    <form action="{{ route('mascotacliente.destroy2', $mascota)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" id="deletePetButton" 
                                                onclick="return confirm('¿Estás seguro de que deseas desligar a {{ $mascota->nombre }}?')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>

                                        <input type="hidden" value="{{$cliente->rut}}" name="rut_cliente">

                                    </form>
                                    
                                </td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="col-12 mb-2">
                    <button class="btn w-100" type="button" id="addPetButton" data-bs-toggle="modal"
                    data-bs-target="#addPetModal">
                        Ligar una nueva mascota
                    </button>
                </div>


            </div>


        </div>
    </div>

    <div class="container-fluid col-lg-10 col-12 bg-white shadow rounded py-2 mb-3" id="datesContainer">
        <a href="#collapseDates" data-bs-toggle="collapse" id="collapseDatesToggler">
            <i class="fa-solid fa-caret-down" id="datesIcon"></i>Citas concretadas del cliente</a>

        <div class="collapse" id="collapseDates">
            <div class="table-responsive">
                <table class="table table-hover mt-2">
                    <!-- Table head -->
                    <thead>
                        <!-- Head labels -->
                        <th>Fecha y hora</th>
                        <th>Pesaje</th>
                        <th>Estado</th>
                        <th>Mascota</th>
                        <th>Peluquero</th>
                    </thead>

                    <!-- Table body -->
                    <tbody>
                        {{-- @foreach ($citas as $cita)
                    <tr>
                        <td>{{$cita->fecha}}// {{$cita->hora}}</td>
                        <td>{{$cita->pesaje}} kg</td>
                        <td>{{$cita->estado}}</td>
                        <td>{{$cita->mascota->nombre}}</td>
                        <td>{{$cita->usuario->nombre}}</td>
                    </tr>
                    @endforeach --}}

                    </tbody>
                </table>
            </div>


        </div>
    </div>



    <div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ligar una mascota a {{ $cliente->nombre }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="{{route('mascotacliente.store')}}" method="POST">
                        @csrf
                        <div class="col-12 mb-3">
                            <select class="form-select" aria-label="Seleccionar mascota para ligar a el cliente"
                                name="id_mascota">
                                <option selected value="">Seleccione la mascota que desea ligar con {{$cliente->nombre}}</option>
                                @foreach ($mascotasnoligadas as $mascota)
                                    <option value="{{ $mascota->id }}">Nombre: {{ $mascota->nombre }}, Raza: {{$mascota->raza}}, Color: {{$mascota->color}}.</option>
                                @endforeach
                            </select>

                            <input type="hidden" value="{{$cliente->rut}}" id="rut_cliente" name="rut_cliente">

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="deshacerCambios">Cancelar cambios</button>
                    <button type="submit" class="btn btn-primary" id="buttonEdit">Agregar dueño</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
