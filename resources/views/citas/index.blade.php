@extends('templates.master')

@section('title', 'Citas')


@push('style')
<link rel="stylesheet" href="{{ asset('css/citas/index.css') }}">
@endpush

@section('content')

<div class="container-fluid col-lg-10 col-12 px-2 py-4 rounded">
    <div class="row">
        <div class="col-12 col-xl-4 mb-3">
            <div class="calendar">

                <header>
                    <h3></h3>
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

        <div class="col-12 col-xl-8 mb-3">
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Cita para Sparky de Juanito Perez</div>
                        Baño, Corte de pelo y corte de uñas.
                    </div>
                    <span class="badge text-bg-primary rounded-pill">14:30</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Cita para Nene de Marcos Soto</div>
                        Baño.
                    </div>
                    <span class="badge text-bg-primary rounded-pill">15:45</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Cita para Brian de Peter Griffin</div>
                        Baño y corte de pelo.
                    </div>
                    <span class="badge text-bg-primary rounded-pill">16:30</span>
                </li>
            </ol>
        </div>

        <div class="col-12 col-xl-6 mb-3">
            <a class="btn" type="submit" id="addBtn">
                <h2 class="fb6f92"><i class="fa-solid fa-plus"></i>Agregar una Cita</h2>
            </a>
        </div>

        <div class="col-12 col-xl-6 mb-4">
            <a class="btn" id="editBtn">
                <h2 class="fb6f92"><i class="fa-solid fa-pencil"></i>Editar una Cita</h2>
            </a>
        </div>



    </div>


</div>

@endsection

@push('script')
<script src="{{asset('js/citas/citas.js')}}"></script>    
@endpush