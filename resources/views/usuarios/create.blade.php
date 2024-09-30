@extends('templates.master')

@section('title', 'Crear Usuario')


@push('style')
<link rel="stylesheet" href="{{asset('css/usuarios/create.css')}}">
@endpush

@section('content')
<div class="container-fluid col-lg-10 col-12 bg-light rounded shadow">
    <div class="row">
        <div class="col-12 mb-3 p-3">

            <div class="mb-3">
                <h3>Crear una nuevo usuario</h3>
            </div>

            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

            <form action="{{route('usuarios.store')}}" method="POST" id="formCreate">
                @csrf

                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="rut">Rut</label>
                        <input type="text" class="form-control" name="rut" id="rut" required>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email"
                            name="email" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="password">Contraseña</label>
                        <input class="form-control" id="password" type="password"
                            name="password" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="password2">Repetir contraseña</label>
                        <input class="form-control" id="password2" type="password"
                            name="password2" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="fono">Fono</label>
                        <input class="form-control" id="fono" type="texto"
                            name="fono" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label class="form-label" for="rol">Rol</label>
                        <select name="rol" id="rol" class="form-select" required>
                            @foreach($roles as $rol)
                            <option value="{{$rol}}">{{$rol}}</option>
                            @endforeach
                        </select>
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