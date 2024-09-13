@extends('templates.master')

@section('title', 'Informacion de una mascota')


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


<div class="container p-3 mb-3 shadow rounded" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">
    <div class="mb-3">
        <a href="#informacionCollapse" data-bs-toggle="collapse" data-bs-target="#informacionCollapse"
            class="text-decoration-none text-dark">
            <h3 class=""><i class="bi bi-caret-down-fill"></i></i> Informacion de {{$mascota->nombre}}</h3>
        </a>
    </div>

    <div class="collapse show" id="informacionCollapse">
        <div class="col-12 mb-3 p-3 rounded" id="formEditarMascota">
            <form action="{{route('mascotas.update',$mascota)}}" method="POST">
                @csrf

                @method('PUT')

                <div class="row">

                    <div class="col-4 d-none d-md-block ">
                        <img src="{{asset('images/perrito.png')}}" alt="" class="img-fluid rounded shadow border">
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="col-12 mb-2">
                            <label class="form-label" for="nombreInput">Nombre</label>
                            <input class="form-control" id="nombreInput" name="nombreInput" type="text"
                                value="{{$mascota->nombre}}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="razaInput">Raza</label>
                            <input class="form-control" id="razaInput" name="razaInput" type="text"
                                value="{{$mascota->raza}}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="sexoInput">Sexo</label>
                            <input class="form-control" id="sexoInput" name="sexoInput" type="text"
                                value="{{$mascota->sexo}}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="colorInput">Color</label>
                            <input class="form-control" id="colorInput" name="colorInput" type="text"
                                value="{{$mascota->color}}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="pesoInput">Peso</label>
                            <input class="form-control" id="pesoInput" name="pesoInput" type="number"
                                value="{{$mascota->peso}}">
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="fecha_nacimientoInput">Fecha de nacimiento</label>
                            <input class="form-control" id="fecha_nacimientoInput" name="fecha_nacimientoInput"
                                type="date" value="{{$mascota->fecha_nacimiento}}" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="clientesSelect">Dueño de la mascota</label>
                            <select class="form-select" id="clientesSelect" name="clientesSelect" readonly>
                                <option selected>{{$mascota->cliente->nombre}}</option>
                            </select>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#confirmacionModal">Actualizar
                                informacion</button>
                        </div>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="confirmacionModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Cambios</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿¿Desea confirmar los cambios hechos a {{$mascota->nombre}}??</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>


<div class="container p-3 mb-3 shadow rounded" style="background: linear-gradient(rgb(253, 215, 237),#F9CEE7)">
    <div class="mb-3">
        <a href="#citasCollapse" data-bs-toggle="collapse" data-bs-target="#citasCollapse"
            class="text-decoration-none text-dark">
            <h3 class=""><i class="bi bi-caret-down-fill"></i></i> Citas pendientes de {{$mascota->nombre}}</h3>
        </a>
    </div>

    <div class="collapse" id="citasCollapse">
        <div class="col-12" id="tabla-citasPendientes">
            <table class="table table-striped table-hover border rounded">
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


<div class="container shadow p-0">

    <form action="{{route('mascotas.destroy',$mascota)}}" method="POST">

        @csrf
        @method('DELETE')

        <div class="col-12 mb-3" id="boton">
            <button class="btn border-0 rounded text-white w-100" type="submit" style="background-color:#af0808;">
                <h3>
                    <i class="bi bi-trash-fill"></i> Eliminar a {{$mascota->nombre}}
                </h3>
            </button>
        </div>

    </form>


</div>





@endsection