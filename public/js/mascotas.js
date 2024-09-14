$(document).ready(function () {
    // Maneja el cambio de cliente
    $('#rut_cliente').change(function () {
        $('#raza').val('');
        $('#sexo').val('');
        $('#color').val('');
        $('#peso').val('');
        $('#fecha_nacimiento').val('');

        var clienteRut = $(this).val();
        if (clienteRut) {
            $.ajax({
                url: '/api/fetchMascotas/' + clienteRut,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#id').empty();
                    $('#id').append('<option value="0">Seleccione una mascota</option>');
                    $.each(data, function (key, value) {
                        $('#id').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                    });
                }
            });
        } else {
            $('#id').empty();
        }
    });

    // Maneja el cambio de mascota
    $('#id').change(function () {
        var mascotaId = $(this).val();
        if (mascotaId) {
            $.ajax({
                url: '/api/fillMascotas/' + mascotaId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#raza').val(data.raza);
                    $('#sexo').val(data.sexo);
                    $('#color').val(data.color);
                    $('#peso').val(data.peso);
                    $('#fecha_nacimiento').val(data.fecha_nacimiento);

                    var gestionarUrl = '/mascotas/show/' + data.id;
                    $('#gestionarButton').empty();
                    $('#gestionarButton').append('<a href="' + gestionarUrl + '" class="btn btn-primary">Gestionar a ' + data.nombre + '</a>');
                },
                error: function (xhr, status, error) {
                    console.log("Error al obtener los detalles de la mascota: ", error);
                }
            });
        } else {
            $('#raza').val('');
            $('#sexo').val('');
            $('#color').val('');
            $('#peso').val('');
            $('#fecha_nacimiento').val('');
        }
    });
});
