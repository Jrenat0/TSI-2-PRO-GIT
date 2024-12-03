@extends('templates.master')


@section('title','Informacion de un usuario')

@push('style')
<link rel="stylesheet" href="{{ asset('css/clientes/show.css') }}">
@endpush

@section('content')



<div class="container-fluid col-lg-10 col-12 bg-white px-3 py-2 border rounded my-2">

    <h4 class="fw-bold">Informacion de {{$usuario->nombre}}</h4>

    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control mb-2" id="nombre" name="nombre" value="{{$usuario->nombre}}" readonly>

    <label for="rut" class="form-label">Rut</label>
    <input type="text" class="form-control mb-2" id="rut" name="rut" value="{{$usuario->rut}}" readonly>

    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control mb-2" id="email" name="email" value="{{$usuario->email}}" readonly>

    <label for="fono" class="form-label">Fono</label>
    <input type="number" class="form-control mb-2" id="fono" name="fono" value="{{$usuario->fono}}" readonly>

    <div class="col-12 mb-2">
        <label class="form-label" for="rol">Rol</label>
        <select name="rol" id="rol" class="form-select" readonly>
            <option value="{{$usuario->rol}}">{{$usuario->rol}}</option>
        </select>
    </div>

    <form action="{{ route('usuarios.edit', $usuario)}}" method="GET">
        <button class="btn w-100" id="buttonEdit" type="submit">Editar a {{$usuario->nombre}}</button>
    </form>

</div>


@if($usuario->rol == 'Peluquero')
<div class="container-fluid col-lg-10 col-12 bg-white shadow rounded py-2 mb-3" id="datesContainer">
    <a href="#collapseDates" data-bs-toggle="collapse" id="collapseDatesToggler">
        <i class="fa-solid fa-caret-down" id="datesIcon"></i>Citas por hacer de {{$usuario->nombre}}</a>

    <div class="collapse" id="collapseDates">
        <div class="table-responsive">
            <table class="table table-hover mt-2">
                <thead>
                    <th>Fecha y hora</th>
                    <th>Pesaje</th>
                    <th>Estado</th>
                    <th>Mascota</th>
                </thead>

                <!-- Table body -->
                <tbody>
                    @foreach($citas as $cita)
                    <tr>
                        <td>{{$cita->fecha}}// {{$cita->hora}}</td>
                        <td>{{$cita->pesaje}} kg</td>
                        <td>{{$cita->estado}}</td>
                        <td>{{$cita->mascota->nombre}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>
@endif



@endsection