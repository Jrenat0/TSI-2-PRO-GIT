<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

    <script src="https://kit.fontawesome.com/3d7887c41d.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center">

        <div class="container p-3 shadow">

            <div class="row">
                <div class="col-12">

                    <div class="text-center" id="logo">
                        <h5 class="fw-bold">
                            <i class="fa-solid fa-dog"></i>
                            Pet's fancy
                        </h5>
                    </div>

                    <div class="text-center" id="textos">
                        <h1 class="mb-0">Olvidaste tu contraseña?</h1>
                        <p class="mt-0 d-none d-md-block">Ingrese el correo relacionado a la cuenta, para proceder con la recuperacion de la contraseña</p>
                    </div>


                    @if ($errors->any())
                    <div class="alert alert-danger py-2 border-0 shadow-sm">
                        <ul class="mb-1">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{route('auth.forgotEmail')}}" method="POST">

                        @csrf

                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email')is-invalid @enderror" id="email"
                            name="email" placeholder="example@mail.cl" value="{{ old('email') }}">

                        @error('email')
                        <div class="invalid-feedback mb-2">
                            {{$message}}
                        </div>
                        @enderror

                        <button class="btn btn-primary w-100" type="submit" id="login">Recuperar Contraseña</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>