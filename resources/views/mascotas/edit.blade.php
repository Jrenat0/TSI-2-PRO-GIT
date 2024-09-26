@extends('templates.master')


@section('title', 'Editando una mascota')


@push('style')
<link rel="stylesheet" href="{{asset('css/mascotas/edit.css')}}">
@endpush

@section('content')



<div class="container-fluid col-10 mb-5 bg-light rounded">

    <form action="{{route('mascotas.update',$mascota)}}" method="POST" id="formEdit">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-12 col-6 mt-2 mb-3">
                <h2 class="text-center fw-bold">Editando a {{$mascota->nombre}}</h2>
            </div>

            <div class="col-12 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingrese el nombre de la mascota" required value="{{$mascota->nombre}}">
            </div>

            <div class="col-12 mb-3">
                <label for="raza" class="form-label">Raza</label>
                <input type="text" class="form-control" id="raza" name="raza" placeholder="Ingrese el raza" required
                    value="{{$mascota->raza}}">
            </div>

            <div class="col-12 mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Ingrese el sexo" required
                    value="{{$mascota->sexo}}">
            </div>

            <div class="col-12 mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese el color" required
                    value="{{$mascota->color}}">
            </div>

            <div class="col-12 mb-4">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" class="form-control" id="peso" name="peso" placeholder="Ingrese el peso" required
                    value="{{$mascota->peso}}">
            </div>

            <div class="col-12 mb-4">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                    placeholder="Ingrese la fecha de nacimiento" readonly value="{{$mascota->fecha_nacimiento}}">
            </div>

            <div class="col-12 mb-4">
                <label for="rut_cliente" class="form-label">Fecha de nacimiento</label>
                <input type="text" class="form-control" id="rut_cliente" name="rut_cliente"
                    placeholder="Ingrese el dueño de la mascota" readonly value="{{$mascota->rut_cliente}}">
            </div>

            <div class="col-12 mb-1">
                <button class="btn w-100" type="submit" id="confirmar">Confirmar Cambios</button>
            </div>

        </div>


    </form>

</div>




<div class="container-fluid col-10 shadow p-0">

    <div class="col-12 mb-3">
        <button class="btn" type="button" id="buttonDelete" data-bs-toggle="modal" data-bs-target="#borrarModal">
            <h2><i class="fa-solid fa-trash"></i> Eliminar a {{$mascota->nombre}}</h2>
        </button>
    </div>

    <div class="modal fade" id="borrarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar permanentemente a {{$mascota->nombre}}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection