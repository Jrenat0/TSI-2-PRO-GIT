@extends('templates.master')


@section('title','Informacion de un cliente')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/clientes/show.css') }}">
@endpush

@section('content')

<div class="container bg-white shadow rounded py-2 mb-3" id="infoContainer">
    <a href="#collapseInfo" data-bs-toggle="collapse" id="collapseInfoToggler">
        <i class="fa-solid fa-caret-down" id="infoIcon"></i>Informacion del cliente</a>


    <div class="collapse show" id="collapseInfo">
        <div class="container bg-white px-3 py-2 border rounded my-2">
            <!-- Name Label -->
            <label for="nombre" class="form-label">Nombre</label>
            <!-- Name Input -->
            <input type="text" class="form-control mb-2" id="nombre" name="nombre" readonly>

            <!-- Rut Label -->
            <label for="rut" class="form-label">Rut</label>
            <!-- Rut Input -->
            <input type="text" class="form-control mb-2" id="rut" name="rut" readonly>

            <!-- Email Label -->
            <label for="email" class="form-label">Email</label>
            <!-- Email Input -->
            <input type="email" class="form-control mb-2" id="email" name="email" readonly>

            <!-- Fono Label -->
            <label for="fono" class="form-label">Fono</label>
            <!-- Fono Input -->
            <input type="number" class="form-control mb-2" id="fono" name="fono" readonly>

            <!-- Direccion Label -->
            <label for="direccion" class="form-label">Dirección</label>
            <!-- Direccion Input -->
            <input type="text" class="form-control mb-2" id="direccion" name="direccion" readonly>
        </div>

    </div>
</div>

<div class="container bg-white shadow rounded py-2 mb-3" id="petsContainer">
    <a href="#collapsePets" data-bs-toggle="collapse" id="collapsePetsToggler">
        <i class="fa-solid fa-caret-down" id="petsIcon"></i>Mascotas del cliente</a>


    <div class="collapse" id="collapsePets">
        <table class="table table-hover mt-2">
            <!-- Table head -->
            <thead>
                <!-- Head labels -->
                <th>Nombre</th>
                <th>Raza</th>
                <th class="d-none d-md-table-cell">Sexo</th>
                <th>Color</th>
                <th class="d-none d-md-table-cell">Peso</th>
                <th class="d-none d-md-table-cell">Fecha de nacimiento</th>
            </thead>

            <!-- Table body -->
            <tbody>
                <!-- Name -->
                <td>Sparky</td>
                <!-- Race -->
                <td>Golden Retriever</td>
                <!-- Gender -->
                <td class="d-none d-md-table-cell">Macho</td>
                <!-- Colour -->
                <td>Dorado</td>
                <!-- Weight -->
                <td class="d-none d-md-table-cell">60 kg.</td>
                <!-- Birthdate -->
                <td class="d-none d-md-table-cell">10/10/2017</td>
            </tbody>
        </table>
    </div>
</div>

<div class="container bg-white shadow rounded py-2 mb-3" id="datesContainer">
    <a href="#collapseDates" data-bs-toggle="collapse" id="collapseDatesToggler">
        <i class="fa-solid fa-caret-down" id="datesIcon"></i>Citas concretadas del cliente</a>

    <div class="collapse" id="collapseDates">
        <table class="table table-hover mt-2">
            <!-- Table head -->
            <thead>
                <!-- Head labels -->
                <th>Fecha y hora</th>
                <th class="d-none d-md-table-cell">Pesaje</th>
                <th class="d-none d-md-table-cell">Estado</th>
                <th>Mascota</th>
                <th>Peluquero</th>
            </thead>

            <!-- Table body -->
            <tbody>
                <!-- Date and Time -->
                <td>10/10/17 // 13:30</td>
                <!-- Weight -->
                <td class="d-none d-md-table-cell">30 kg.</td>
                <!-- State -->
                <td class="d-none d-md-table-cell">Terminada.</td>
                <!-- Pet -->
                <td>Sparky</td>
                <!-- Groomer -->
                <td>Felipe</td>

            </tbody>
        </table>
    </div>
</div>


@endsection