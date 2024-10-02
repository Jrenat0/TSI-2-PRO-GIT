@extends('templates.master')

@section('title', 'Usuarios')

@push('style')
<link rel="stylesheet" href="{{ asset('css/usuarios/index.css')}}">
@endpush

@section('content')

<div class="container-fluid col-lg-10 col-12 px-2">
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
                                        <th>Opciones</th>
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
                                        <td>
                                            <a class="btn" id="options" href="">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a class="btn" id="options" href="">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
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
        <div class="col-12 col-xl-4 mb-3">
            <!-- Card -->
            <div class="card px-3 py-2 shadow">
                <!-- Card Title -->
                <h3 class="text-center">Peluqueros</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <ul class="list-group">
                        @foreach($usuarios as $usuario)
                        @if($usuario->rol == 'Peluquero')
                        <li class="list-unstyled">
                            <a class="btn mb-2 p-2" href="{{route('usuarios.show',$usuario)}}" id="itemLista">
                                <p class="mb-0">{{$usuario->nombre}}</p>
                                <p class="mb-0">{{$usuario->email}}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach
                        
                        <li class="list-unstyled">
                            <a class="btn mb-2" href="{{route('usuarios.create')}}" id="btnAdd">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Table Peluqueros -->
        <div class="col-12 col-xl-4 mb-3 ">
            <!-- Card -->
            <div class="card px-3 py-2 shadow">
                <!-- Card Title -->
                <h3 class="text-center">Secretarios</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <ul class="list-group">
                        @foreach($usuarios as $usuario)
                        @if($usuario->rol == 'Secretario')
                        <li class="list-unstyled">
                            <a class="btn mb-2 p-2" href="{{route('usuarios.show',$usuario)}}" id="itemLista">
                                <p class="mb-0">{{$usuario->nombre}}</p>
                                <p class="mb-0">{{$usuario->email}}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach

                        <li class="list-unstyled">
                            <a class="btn mb-2" href="{{route('usuarios.create')}}" id="btnAdd">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Table Peluqueros -->
        <div class="col-12 col-xl-4 mb-3">
            <!-- Card -->
            <div class="card px-3 py-2 shadow">
                <!-- Card Title -->
                <h3 class="text-center">Administradores</h3>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Table Container -->
                    <ul class="list-group">
                        @foreach($usuarios as $usuario)
                        @if($usuario->rol == 'Administrador')
                        <li class="list-unstyled">
                            <a class="btn mb-2 p-2" href="{{route('usuarios.show',$usuario)}}" id="itemLista">
                                <p class="mb-0">{{$usuario->nombre}}</p>
                                <p class="mb-0">{{$usuario->email}}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach

                        <li class="list-unstyled">
                            <a class="btn mb-2" href="{{route('usuarios.create')}}" id="btnAdd">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>



    </div>



</div>


@endsection