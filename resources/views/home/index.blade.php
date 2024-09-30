@extends('templates.master')

@section('title', 'Inicio')


@push('style')
<link rel="stylesheet" href="{{ asset('css/home/index.css') }}">
@endpush

@section('content')

<div class="container-fluid col-lg-10 col-12">

    <div class="row">
        {{-- Seccion Mascotas --}}
        <div class="col-12 col-xxl-6 mb-3">
            {{-- Tabla de las mascotas nuevas --}}
            <div class="card px-3 py-2 mb-2">
                <!-- Card Title -->
                <h3 class="">Mascotas Nuevas</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="table table-hover border rounded">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <!-- Head labels -->
                                    <th>Nombre</th>
                                    <th class="">Raza</th>
                                    <th class="">Sexo</th>
                                    <th class="">Color</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach($mascotas as $mascota)
                                <tr>
                                    <!-- Name -->
                                    <td>{{$mascota->nombre}}</td>
                                    <!-- Breed -->
                                    <td>{{$mascota->raza}}</td>
                                    <!-- Genre -->
                                    <td>{{$mascota->sexo}}</td>
                                    <!-- Colour -->
                                    <td>{{$mascota->color}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Boton --}}
            <a href="{{ route('mascotas.index') }}" class="btn" id="widget">
                <h2 class="" id="btnMascotas"><i class="fa-solid fa-paw"></i></h2>
            </a>
        </div>

        {{-- Seccion Clientes --}}
        <div class="col-12 col-xxl-6 mb-3">
            {{-- Tabla de los clientes nuevos --}}
            <div class="card px-3 py-2 mb-2">
                <!-- Card Title -->
                <h3 class="">Clientes Nuevos</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="table table-hover border rounded">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <!-- Head labels -->
                                    <th>Nombre</th>
                                    <th class="">Rut</th>
                                    <th class="">Fono</th>
                                    <th class="">Email</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <!-- Name -->
                                    <td>{{$cliente->nombre}}</td>
                                    <!-- Rut -->
                                    <td>{{$cliente->rut}}</td>
                                    <!-- Phone -->
                                    <td>{{$cliente->fono}}</td>
                                    <!-- Email -->
                                    <td>{{$cliente->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Boton --}}
            <a href="{{ route('clientes.index') }}" class="btn" id="widget">
                <h2 class="" id="btnClientes"><i class="fa-solid fa-person"></i></h2>
            </a>
        </div>

        {{-- Seccion Citas --}}
        <div class="col-12 col-xxl-6 mb-3">
            {{-- Tabla de las citas para hoy --}}
            <div class="card px-3 py-2 mb-2">
                <!-- Card Title -->
                <h3 class="">Citas para Hoy</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="table table-hover border rounded">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <!-- Head labels -->
                                    <th>Mascota</th>
                                    <th>Peluquero</th>
                                    <th>Horario</th>
                                    <th>Tipo de atencion</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach($citas as $cita)
                                <tr>
                                    <td>{{$cita->mascota->nombre}}</td>
                                    <td>{{$cita->usuario->nombre}}</td>
                                    <td>{{$cita->hora}}</td>
                                    <td>
                                        @foreach($cita->detalle_cita as $detalle)
                                        {{$detalle->servicio->nombre}}{{ $loop->last ? '.' : ',' }}
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Boton --}}
            <a href="{{ route('citas.index') }}" class="btn" id="widget">
                <h2 class="" id="btnCitas"><i class="fa-solid fa-calendar-check"></i></h2>
            </a>
        </div>

        {{-- Seccion Servicios --}}
        <div class="col-12 col-xxl-6 mb-3">
            {{-- Tabla de los servicios disponibles --}}
            <div class="card px-3 py-2 mb-2">
                <!-- Card Title -->
                <h3 class="">Servicios Disponibles</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="table table-hover border rounded">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <!-- Head labels -->
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Duracion</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach($servicios as $servicio)
                                <tr>
                                    <!-- Name -->
                                    <td>{{$servicio->nombre}}</td>
                                    <!-- Breed -->
                                    <td>{{$servicio->costo}}</td>
                                    <!-- Genre -->
                                    <td>{{$servicio->duracion_estimada}}</td>
                                    <!-- Colour -->
                                    <td><em>"{{$servicio->descripcion}}"</em></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Boton --}}
            <a href="{{ route('servicios.index') }}" class="btn" id="widget">
                <h2 class="" id="btnServicios"><i class="fa-solid fa-scissors"></i></h2>
            </a>
        </div>

        {{-- Seccion Usuarios --}}

        @if(Gate::allows('admin-gestion'))
        <div class="col-12">
            {{-- Boton --}}
            <a href="{{ route('usuarios.index') }}" class="btn" id="widget">
                <h2 class="" id="btnUsuarios"><i class="fa-solid fa-user-group"></i></h2>
            </a>
        </div> 
        @endif
    </div>
</div>


@endsection