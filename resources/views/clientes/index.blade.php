@extends('templates.master')


@section('title', 'Clientes')



@push('style')
<link rel="stylesheet" href="{{asset('css/clientes/index.css') }}">
@endpush


@section('content')

<div class="col-12 mb-3 text-end">
    <a href="{{route('clientes.create')}}" class="btn btn-outline-light" >Agregar un Nuevo cliente</a>
</div>
<!-- Search Container -->
<div class="container-fluid col-lg-10 col-12 bg-light rounded shadow">
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
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Gestionar</th>
                    </thead>

                    <!-- Table body -->
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->rut}}</td>
                            <td>{{$cliente->email}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>
                                <a class="btn" id="options" href="{{route('clientes.show',$cliente)}}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>



    </div>

</div>

@endsection