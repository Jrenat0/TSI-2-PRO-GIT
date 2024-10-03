$(document).ready(function () {
    // Maneja el cambio de cliente
    $('#clientesSelect').change(function () {
        $('#razaInput').val('');
        $('#sexoInput').val('');
        $('#colorInput').val('');
        $('#pesoInput').val('');
        $('#fecha_nacimientoInput').val('');

        var clienteRut = $(this).val();
        if (clienteRut) {
            $.ajax({
                url: '/api/fetchMascotas/' + clienteRut,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#mascotasSelect').empty();
                    $('#mascotasSelect').append('<option value="0">Seleccione una mascota</option>');
                    $.each(data, function (key, value) {
                        $('#mascotasSelect').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                    });
                }
            });
        } else {
            $('#mascotasSelect').empty();
        }
    });

    // Maneja el cambio de mascota
    $('#mascotasSelect').change(function () {
        var mascotaId = $(this).val();
        if (mascotaId) {
            $.ajax({
                url: '/api/fillMascotas/' + mascotaId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#razaInput').val(data.raza);
                    $('#sexoInput').val(data.sexo);
                    $('#colorInput').val(data.color);
                    $('#pesoInput').val(data.peso);
                    $('#fecha_nacimientoInput').val(data.fecha_nacimiento);

                    var gestionarUrl = '/mascotas/show/' + data.id;
                    $('#gestionarButton').empty();
                    $('#gestionarButton').append('<a href="' + gestionarUrl + '" class="btn"  id="gestionButton">Gestionar a ' + data.nombre + '</a>');
                },
                error: function (xhr, status, error) {
                    console.log("Error al obtener los detalles de la mascota: ", error);
                }
            });
        } else {
            $('#razaInput').val('');
            $('#sexoInput').val('');
            $('#colorInput').val('');
            $('#pesoInput').val('');
            $('#fecha_nacimientoInput').val('');
        }
    });
});
