@extends('templates.master')

@section('title', 'Informacion de una mascota')


@push('style')
    <link rel="stylesheet" href="{{ asset('css/mascotas/show.css') }}">
@endpush


@section('content')

    {{-- Ventana de informacion de la mascota --}}
    <div class="container-fluid col-lg-10 col-12 bg-light rounded shadow py-2 mb-3" id="infoContainer">
        <a href="#informacionCollapse" data-bs-toggle="collapse" data-bs-target="#informacionCollapse">
            <i class="fa-solid fa-caret-down"></i>
            Informacion de {{ $mascota->nombre }}
        </a>

        <div class="collapse show" id="informacionCollapse">
            <div class="row">
                <div class="col-4 d-none d-md-block ">
                    <img src="{{ Storage::url($mascota->imagen) }}" alt="" class="img-fluid rounded shadow border">
                </div>

                <div class="col-12 col-md-8">

                    <div class="row">

                        <div class="col-12 mb-2">
                            <label class="form-label" for="nombreInput">Nombre</label>
                            <input class="form-control" id="nombreInput" name="nombreInput" type="text"
                                value="{{ $mascota->nombre }}" readonly>
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="razaInput">Raza</label>
                            <input class="form-control" id="razaInput" name="razaInput" type="text"
                                value="{{ $mascota->raza }}" readonly>
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="sexoInput">Sexo</label>
                            <input class="form-control" id="sexoInput" name="sexoInput" type="text"
                                value="{{ $mascota->sexo }}" readonly>
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="colorInput">Color</label>
                            <input class="form-control" id="colorInput" name="colorInput" type="text"
                                value="{{ $mascota->color }}" readonly>
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="pesoInput">Peso</label>
                            <input class="form-control" id="pesoInput" name="pesoInput" type="number"
                                value="{{ $mascota->peso }}" readonly>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="fecha_nacimientoInput">Fecha de nacimiento</label>
                            <input class="form-control" id="fecha_nacimientoInput" name="fecha_nacimientoInput"
                                type="date" value="{{ $mascota->fecha_nacimiento }}" readonly>
                        </div>

                        <div class="col-12 col-xl-6 mb-2">
                            <label class="form-label" for="clientesSelect">Dueños de la mascota</label>
                            <select class="form-select" id="clientesSelect" name="clientesSelect" readonly>
                                @foreach ($mascota->clientes as $cliente)
                                    <option value="{{ $cliente->rut }}">
                                        {{ $cliente->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-xl-3 mb-2 d-flex align-items-end">
                            <button class="btn w-100" type="button" id="addOwnerButton" data-bs-toggle="modal"
                                data-bs-target="#addOwnerModal">
                                Agregar un dueño
                            </button>
                        </div>

                        <div class="col-12 col-xl-3 mb-2 d-flex align-items-end">
                            <button class="btn w-100" type="button" id="deleteOwnerButton" data-bs-toggle="modal"
                                data-bs-target="#deleteOwnerModal">
                                Eliminar un dueño
                            </button>
                        </div>

                        <div class="col-12 mt-4 mb-2">
                            <form action="{{ route('mascotas.edit', $mascota) }}" method="GET">
                                <button class="btn w-100" id="buttonEdit" type="submit">Editar a
                                    {{ $mascota->nombre }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Ventana modal agregar dueño --}}

    <!-- Modal -->
    <div class="modal fade" id="addOwnerModal" tabindex="-1" aria-labelledby="addOwnerModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar dueño a {{ $mascota->nombre }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="{{ route('mascotacliente.store') }}" method="POST">
                        @csrf
                        <div class="col-12 mb-3">
                            <select class="form-select" aria-label="Seleccionar cliente para agregar como dueño"
                                name="rut_cliente">
                                <option selected value="">Seleccione el cliente que desea agregar como dueño</option>
                                @foreach ($clientesnoligados as $cliente)
                                    <option value="{{ $cliente->rut }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>

                            <input type="hidden" value="{{ $mascota->id }}" id="id_mascota" name="id_mascota">

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

    <div class="modal fade" id="deleteOwnerModal" tabindex="-1" aria-labelledby="deleteOwnerModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar dueño a {{ $mascota->nombre }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="{{ route('mascotacliente.destroy') }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <div class="col-12 mb-3">
                            <select class="form-select" aria-label="Seleccionar cliente para agregar como dueño"
                                name="rut_cliente">
                                <option selected value="">Seleccione el dueño que desvincular de la mascota</option>
                                @foreach ($mascota->clientes as $cliente)
                                    <option value="{{ $cliente->rut }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>

                            <input type="hidden" value="{{ $mascota->id }}" id="id_mascota" name="id_mascota">

                        </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="deshacerCambios">Cancelar cambios</button>
                    <button type="submit" class="btn btn-primary" id="buttonEdit">Desvincular dueño</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Ventana de informacion de las citas concretadas de la mascota --}}
    <div class="container-fluid col-lg-10 col-12 py-2 mb-3 bg-light shadow rounded" id="citasContainer">
        <a href="#citasCollapse" data-bs-toggle="collapse" data-bs-target="#citasCollapse">
            <i class="fa-solid fa-caret-down"></i> Citas pendientes de {{ $mascota->nombre }}
        </a>

        <div class="collapse" id="citasCollapse">
            <div class="col-12 table-responsive" id="tabla-citasPendientes">
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Mascota</th>
                            <th scope="col">Peluquero(s)</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Tipo de atencion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr>
                                <td>{{ $cita->mascota->nombre }}</td>
                                <td>
                                    @foreach ($cita->usuarios->unique('rut') as $usuario)
                                        {{ $usuario->nombre }}{{ $loop->last ? '.' : ',' }}
                                    @endforeach
                                </td>
                                <td>{{ $cita->hora }}</td>
                                <td>
                                    @foreach ($cita->detalle_cita as $detalle)
                                        {{ $detalle->servicio->nombre }}{{ $loop->last ? '.' : ',' }}
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
