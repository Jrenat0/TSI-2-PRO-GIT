@extends('templates.master')

@section('title', 'Crear Usuario')


@push('style')
    <link rel="stylesheet" href="{{ asset('css/usuarios/create.css') }}">
@endpush

@section('content')
    <div class="container-fluid col-lg-10 col-12 bg-light rounded shadow">
        <div class="row">
            <div class="col-12 mb-3 p-3">

                <div class="mb-3">
                    <h3>Crear una nuevo usuario</h3>
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

                <form action="{{ route('usuarios.store') }}" method="POST" id="formCreate">

                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label" for="rut">Rut</label>
                            <input type="text" class="form-control @error('rut') is-invalid @enderror" name="rut"
                                id="rut" value="{{ old('rut') }}">
                            @error('rut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                name="nombre" value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="password">Contraseña</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                type="password" name="password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="fono">Fono</label>
                            <input class="form-control @error('fono') is-invalid @enderror" id="fono" type="text"
                                name="fono" value="{{ old('fono') }}">
                            @error('fono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label class="form-label" for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-select @error('rol') is-invalid @enderror"
                                value="{{ old('rol') }}">
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol }}">{{ $rol }}</option>
                                @endforeach
                            </select>
                            @error('rol')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mt-2 text-center">
                            <button type="submit" class="btn btn-outline-primary">Crear Usuario</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush
