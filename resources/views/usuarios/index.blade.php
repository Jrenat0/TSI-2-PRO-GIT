@extends('templates.master')

@section('title', 'Usuarios')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/usuarios/index.css')}}">
@endpush

@section('content')

<div class="container-fluid col-10 px-2">
    <!-- Row -->
    <div class="row">
        <!-- Form Consultar Usuario-->
        <div class="col-12 mb-3">
            <!-- Card -->
            <div class="card shadow border-0">
                <!-- Card Title -->
                <h2 class="text-center my-2">Consultar un usuario</h2>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Card content -->
                    <div class="row">
                        <!-- Form title -->
                        <div class="col-12 mt-4">
                            <h5 class="fw-bold">Buscar a un usuario específico</h5>
                        </div>
                        <!-- Name input -->
                        <div class="col-12 col-md-6 mb-4">
                            <input type="text" class="form-control" id="nombre" placeholder="Buscar por nombre o RUT">
                        </div>
                        <!-- Search results label -->
                        <div class="col-12">
                            <h5 class="fw-bold">Resultados de la búsqueda</h5>
                        </div>
                        <!-- Results table container -->
                        <div class="table-responsive">
                            <!-- Clase para hacer la tabla responsive -->
                            <!-- Results table -->
                            <table class="table table-hover border rounded">
                                <!-- Table head -->
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class="d-none d-md-table-cell">Rut</th>
                                        <th class="d-none d-md-table-cell">Email</th>
                                        <th class="d-none d-md-table-cell">Fono</th>
                                        <th>Rol</th>
                                        <th id="options">Opciones</th>
                                    </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody>
                                    <tr>
                                        <!-- Name -->
                                        <td>Fancy</td>
                                        <!-- Rut -->
                                        <td class="d-none d-md-table-cell">21.268.821-2</td>
                                        <!-- Email -->
                                        <td class="d-none d-md-table-cell text-truncate" style="max-width: 150px;">
                                            Admin@petsfancy.cl</td>
                                        <!-- Phone -->
                                        <td class="d-none d-md-table-cell">950502525</td>
                                        <!-- Role -->
                                        <td>Administrador</td>
                                        <!-- Manage options -->
                                        <td id="options">
                                            <div class="dropdown">
                                                <!-- Dropdown toggle button -->
                                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <!-- Dropdown items -->
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Más detalles</a></li>
                                                    <li><a class="dropdown-item" href="#">Editar usuario</a></li>
                                                    <li><a class="dropdown-item" href="#">Borrar usuario</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table Peluqueros -->
        <div class="col-12 col-xl-6 mb-3">
            <!-- Card -->
            <div class="card px-3 py-2">
                <!-- Card Title -->
                <h3 class="">Peluqueros Activos</h3>
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
                                    <th class="d-none d-md-table-cell">Rut</th>
                                    <th class="d-none d-md-table-cell">Email</th>
                                    <th class="d-none d-md-table-cell">Fono</th>
                                    <th>Rol</th>
                                    <th id="options">Opciones</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                <tr>
                                    <!-- Name -->
                                    <td>Fancy</td>
                                    <!-- Rut -->
                                    <td class="d-none d-md-table-cell">21.268.821-2</td>
                                    <!-- Email -->
                                    <td class="d-none d-md-table-cell">Admin@petsfancy.cl</td>
                                    <!-- Phone -->
                                    <td class="d-none d-md-table-cell">950502525</td>
                                    <!-- Role -->
                                    <td>Administrador</td>
                                    <!-- Manage options -->
                                    <td id="options">
                                        <!-- Options dropdown -->
                                        <div class="dropdown">
                                            <!-- Dropdown toggle button -->
                                            <button class="btn" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <!-- Dropdown items -->
                                            <ul class="dropdown-menu">
                                                <!-- More details button -->
                                                <li><a class="dropdown-item" href="#">Mas detalles</a></li>
                                                <!-- User editor button -->
                                                <li><a class="dropdown-item" href="#">Editar usuario</a></li>
                                                <!-- Erase a user button -->
                                                <li><a class="dropdown-item" href="#">Borrar usuario</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Secretarios -->
        <div class="col-12 col-xl-6"></div>

    </div>



</div>


@endsection