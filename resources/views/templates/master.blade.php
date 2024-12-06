<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/templates/master.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}"> --}}

    {{-- <script src="https://kit.fontawesome.com/3d7887c41d.js" crossorigin="anonymous"></script> --}}

    @stack('style')


</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light">

        <div class="container-fluid col-12 col-lg-10 py-2 px-4 shadow" id="navbar-container">
            <!-- Navbar Logo -->
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <i class="fa-solid fa-dog"></i>
                <span class="fw-bold" id="logo-text">Pet's Fancy</span>
            </a>

            <!-- Collapse items -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-caret-down"></i>
            </button>

            <!-- Center items -->
            <div class="collapse navbar-collapse px-4" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestionar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('mascotas.index') }}">Mascotas</a></li>
                            <li><a class="dropdown-item" href="{{ route('citas.index') }}">Citas</a></li>
                            <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicios.index') }}">Servicios</a></li>
                            @if(Gate::allows('admin-gestion'))
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                            @endif
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Exportar</a>
                    </li> --}}

                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">Cerrar sesion</a>
                    </li>

                </ul>
            </div>

            <!-- User Button -->
            <button class="btn d-none d-lg-block" type="button" id="userButton">
                <i class="fa-solid fa-user"></i>
                @auth
                <small>{{ Auth::user()->nombre }} ({{ Auth::user()->nombreRol() }})</small>
                @endauth
            </button>

            <a class="btn d-none d-md-block" id="logoutButton" href="{{route('auth.logout')}}">
                <i class="fa-solid fa-right-from-bracket"></i>
                <small>Cerrar Sesion</small>
            </a>
        </div>
    </nav>




    <div class="container-fluid mt-3 p-3">
        @yield('content')
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    @stack('script')

</body>

</html>