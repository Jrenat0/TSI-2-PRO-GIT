@extends('templates.master')

@section('title', 'Informacion de una mascota')


@push('style')
<link rel="stylesheet" href="{{asset('css/mascotas/show.css')}}">
@endpush


@section('content')


<div class="container-fluid col-lg-10 col-12 bg-light rounded shadow py-2 mb-3" id="infoContainer">
    <a href="#informacionCollapse" data-bs-toggle="collapse" data-bs-target="#informacionCollapse">
        <i class="fa-solid fa-caret-down"></i>
        Informacion de {{$mascota->nombre}}
    </a>

    <div class="collapse show" id="informacionCollapse">
        <div class="row">
            <div class="col-4 d-none d-md-block ">
                <img src="{{asset('images/perrito.png')}}" alt="" class="img-fluid rounded shadow border">
            </div>

            <div class="col-12 col-md-8">
                
                <div class="col-12 mb-2">
                    <label class="form-label" for="nombreInput">Nombre</label>
                    <input class="form-control" id="nombreInput" name="nombreInput" type="text"
                        value="{{$mascota->nombre}}" readonly>
                </div>

                <div class="col-12 mb-2">
                    <label class="form-label" for="razaInput">Raza</label>
                    <input class="form-control" id="razaInput" name="razaInput" type="text" value="{{$mascota->raza}}" readonly>
                </div>

                <div class="col-12 mb-2">
                    <label class="form-label" for="sexoInput">Sexo</label>
                    <input class="form-control" id="sexoInput" name="sexoInput" type="text" value="{{$mascota->sexo}}" readonly>
                </div>

                <div class="col-12 mb-2">
                    <label class="form-label" for="colorInput">Color</label>
                    <input class="form-control" id="colorInput" name="colorInput" type="text"
                        value="{{$mascota->color}}" readonly>
                </div>

                <div class="col-12 mb-2">
                    <label class="form-label" for="pesoInput">Peso</label>
                    <input class="form-control" id="pesoInput" name="pesoInput" type="number"
                        value="{{$mascota->peso}}" readonly>
                </div>

                <div class="col-12 mb-2">
                    <label class="form-label" for="fecha_nacimientoInput">Fecha de nacimiento</label>
                    <input class="form-control" id="fecha_nacimientoInput" name="fecha_nacimientoInput" type="date"
                        value="{{$mascota->fecha_nacimiento}}" readonly>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label" for="clientesSelect">Dueño de la mascota</label>
                    <select class="form-select" id="clientesSelect" name="clientesSelect" readonly>
                        <option selected>{{$mascota->cliente->nombre}}</option>
                    </select>
                </div>

                <form action="{{route('mascotas.edit',$mascota)}}" method="GET">
                    <button class="btn w-100" id="buttonEdit" type="submit">Editar a {{$mascota->nombre}}</button>
                </form>
                
                
            </div>

            



        </div>
    </div>
</div>


<div class="container-fluid col-lg-10 col-12 py-2 mb-3 bg-light shadow rounded" id="citasContainer">
    <a href="#citasCollapse" data-bs-toggle="collapse" data-bs-target="#citasCollapse">
        <i class="fa-solid fa-caret-down"></i> Citas pendientes de {{$mascota->nombre}}
    </a>

    <div class="collapse" id="citasCollapse">
        <div class="col-12 table-responsive" id="tabla-citasPendientes">
            <table class="table table-hover mt-2">
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
    </div>

</div>

@endsection