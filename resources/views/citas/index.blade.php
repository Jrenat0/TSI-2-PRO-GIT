@extends('templates.master')

@section('title', 'Citas')


@push('style')
    <link rel="stylesheet" href="{{ asset('css/citas/index.css') }}">
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

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>


    <div class="container-fluid col-lg-10 col-12 px-4 py-4 rounded" style="background: rgba(255, 255, 255, 0.8)">
        <div class="row">
            <div class="col-12 col-xl-6 mb-3 d-flex justify-content-start">
                <div class="calendar">

                    <header>
                        <h3 id="mes"></h3>
                        <nav>
                            <button id="prev"></button>
                            <button id="next"></button>
                        </nav>
                    </header>

                    <section>
                        <ul class="days" id="days">
                            <li>Dom</li>
                            <li>Lun</li>
                            <li>Mar</li>
                            <li>Mie</li>
                            <li>Jue</li>
                            <li>Vie</li>
                            <li>Sab</li>
                        </ul>

                        <ul class="dates">

                        </ul>

                    </section>

                </div>

            </div>

            <div class="col-12 col-xl-6 mb-3">
                <ol class="list-group list-group-numbered" id="listaCitas">
                    {{-- <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold" id="citaTitle">Cita para Sparky de Juanito Perez</div>
                        <p class="mb-0" id="citaDesc">Baño, Corte de pelo y corte de uñas.</p>
                    </div>
                    <span class="badge text-bg-primary rounded-pill">14:30</span>
                </li> --}}
                </ol>
            </div>
        </div>


    </div>

@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/citas/citas.js') }}"></script>

    <script>
        var citaUrl = "{{ route('citas.show', ':id') }}";
    </script>
@endpush
