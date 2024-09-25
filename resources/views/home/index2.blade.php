@extends('templates.master')

@section('title', 'Inicio')


@section('content')


<div class="row">

    {{-- Calendario --}}
    <div class="col-12 mb-3" id="calendario">

        <div class="container">
            <img src="{{asset('images/calendar.jpg')}}" alt="" class="img-fluid">
        </div>
        

    </div>
    {{-- /Calendario --}}

    {{-- Botones --}}
    <div class="col-6 col-md-3 mb-3" id="boton">
        <a href="{{route('citas.index')}}" class="text-decoration-none card border-0"
            style="background: linear-gradient(#eb2f6a, #ff5ec1)">
            <div class="card-body text-center">
                <h3 class="card-title text-white"><span class=""></span> Citas</h3>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-3 mb-3" id="boton">
        <a href="{{route('clientes.index')}}" class="text-decoration-none card border-0"
            style="background: linear-gradient(#612BCE, #a557dd)">
            <div class="card-body text-center">
                <h3 class="card-title text-white"><span class=""></span> Clientes</h3>
            </div>
        </a>
    </div>


    <div class="col-6 col-md-3 mb-3" id="boton">
        <a href="{{route('mascotas.index')}}" class="text-decoration-none card border-0"
            style="background: linear-gradient(#1D73CF ,#0DA1C4)">
            <div class="card-body text-center" >
                <h3 class="card-title text-white"><span class=""></span> Mascotas</h3>
            </div>
        </a>
    </div>


    <div class="col-6 col-md-3 mb-3" id="boton">
        <a href="{{route('servicios.index')}}" class="text-decoration-none card border-0"
            style="background: linear-gradient(#ffa631,#ffd42a)">
            <div class="card-body text-center">
                <h3 class="card-title text-white"><span class=""></span> Servicios</h3>
            </div>
        </a>
    </div>

    <div class="col-12 mb-3" id="boton">
        <a href="{{route('usuarios.index')}}" class="text-decoration-none card border-0"
            style="background: linear-gradient(#1f9e6d, #68d4ab)">
            <div class="card-body text-center">
                <h3 class="card-title text-white"><span class=""></span> Usuarios</h3>
            </div>
        </a>
    </div>

    {{-- /Botones --}}


    {{-- Tabla de citas para hoy --}}
    <div class="col-12 col-md-6" id="tabla-citasHoy">

        <h3>Citas para hoy</h3>

        <table class="table table-striped table-hover border rounded shadow">
            <thead>
                <tr>
                    <th scope="col">Mascota</th>
                    <th scope="col">Peluquero</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Tipo de atencion</th>
                </tr>
            </thead>
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
    {{-- /Tabla de citas para hoy --}}

    {{-- Tabla de servicios disponibles --}}
    <div class="col-12 col-md-6" id="tabla-serviciosDisponibles">
        <h3>Servicios disponibles</h3>

        <table class="table table-striped table-hover border rounded shadow">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Duracion estimada</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                <tr>
                    <td>{{$servicio->nombre}}</td>
                    <td>${{$servicio->costo}}</td>
                    <td>{{$servicio->duracion_estimada}}</td>
                    <td><em>"{{$servicio->descripcion}}"</em></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- /Tabla de servicios disponibles --}}



</div>




@endsection