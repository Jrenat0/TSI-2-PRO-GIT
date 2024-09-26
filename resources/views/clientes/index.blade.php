@extends('templates.master')


@section('title', 'Clientes')



@push('style')
<link rel="stylesheet" href="{{asset('css/clientes/index.css') }}">
@endpush


@section('content')

<!-- Search Container -->
<div class="container-fluid col-10 bg-light rounded shadow">

    <!-- Row -->
    <div class="row">

        <!-- Form title -->
        <div class="col-12 mt-4">
            <h4 class="fw-bold">Gestionar clientes</h4>
        </div>

        <!-- Name input -->
        <div class="col-12 col-md-6 mb-4">
            <input type="text" class="form-control" id="nombre" placeholder="Buscar por nombre o rut">
        </div>

        <!-- Search results label -->
        <div class="col-12">
            <h5 class="fw-bold">Resultados de la busqueda</h5>
        </div>

        <!-- Results table container -->
        <div class="container">
            <!-- Results table -->
            <div class="table-responsive">
                <table class="table table-hover border rounded">
                    <!-- Table head -->
                    <thead>
                        <!-- Head labels -->
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th class="">Email</th>
                        <th class="">Direccion</th>
                        <th id="options">Opciones</th>
                    </thead>

                    <!-- Table body -->
                    <tbody>
                        <!-- Name -->
                        <td>Ejemplo</td>
                        <!-- Rut -->
                        <td>21.268.821-2</td>
                        <!-- eMail -->
                        <td class="">example@mail.cl</td>
                        <!-- Address -->
                        <td class="">Los olivos 104-A</td>
                        <!-- Manage options -->
                        <td id="options">
                            <!-- Options dropdown -->
                            <div class="dropdown">
                                <!-- Dropdown toggle button -->
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <!-- Dropdown items -->
                                <ul class="dropdown-menu">
                                    <!-- More details button -->
                                    <li><a class="dropdown-item" href="#">Mas detalles</a></li>
                                    <!-- Client editor button -->
                                    <li><a class="dropdown-item" href="#">Editar cliente</a></li>
                                    <!-- Erase a client button -->
                                    <li><a class="dropdown-item" href="#">Borrar cliente</a></li>
                                </ul>
                            </div>
                        </td>
                    </tbody>
                </table>
            </div>

        </div>



    </div>

</div>

@endsection