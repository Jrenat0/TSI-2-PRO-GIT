@extends('templates.master')


@section('title', 'Editando a un cliente')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/clientes/edit.css') }}">
@endpush

@section('content')

    <div class="container-fluid col-lg-10 col-12 px-0">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        @if (session('error'))
            <div class="alert alert-danger fade show">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="container-fluid col-lg-10 col-12 mb-5 bg-light rounded">

        <form action="{{ route('clientes.update', $cliente) }}" method="POST" id="formEdit">
            @csrf

            @method('PUT')

            <div class="row">
                <div class="col-12 col-6 mt-2 mb-3">
                    <h2 class="text-center fw-bold">Editando a {{ $cliente->nombre }} | {{ $cliente->email }}</h2>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-12 mb-3">
                    <label for="rut" class="form-label">Rut</label>
                    <input type="text" class="form-control @error('rut') is-invalid @enderror" id="rut"
                        name="rut"value="{{ old('rut', $cliente->rut) }}" placeholder="Ingrese el rut" readonly>
                    @error('rut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        name="nombre" value="{{ old('nombre', $cliente->nombre) }}" placeholder="Ingrese el nombre"
                        required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $cliente->email) }}" placeholder="example@mail.cl" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="fono" class="form-label">Fono</label>
                    <input type="number" class="form-control @error('fono') is-invalid @enderror" id="fono"
                        name="fono" value="{{ old('fono', $cliente->fono) }}" placeholder="Ingrese el teléfono"
                        required>
                    @error('fono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-4">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion"
                        name="direccion" value="{{ old('direccion', $cliente->direccion) }}"
                        placeholder="Ingrese la dirección" required>
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <button class="btn w-100" type="submit" id="confirmar">Confirmar Cambios</button>
                </div>

            </div>

        </form>

    </div>

    <div class="container-fluid col-lg-10 col-12 p-0">

        <div class="col-12 mb-3">
            <button class="btn" type="submit" id="buttonDelete" data-bs-toggle="modal"
                data-bs-target="#borrarClienteModal">
                <h2><i class="fa-solid fa-trash"></i>Eliminar al Cliente</h2>
            </button>
        </div>

        <div class="container-fluid col-lg-10 col-12 shadow p-0">
            <div class="modal fade" id="borrarClienteModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Eliminación</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar permanentemente a {{ $cliente->nombre }}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>

                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" id="formDelete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>








@endsection
