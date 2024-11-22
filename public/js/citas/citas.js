const header = document.querySelector(".calendar h3");
const dates = document.querySelector(".dates");
const navs = document.querySelectorAll("#prev, #next");

const months = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
];

let date = new Date();
let month = date.getMonth();
let year = date.getFullYear();

function renderCalendar() {
    const start = new Date(year, month, 1).getDay();
    const endDate = new Date(year, month + 1, 0).getDate();
    const end = new Date(year, month, endDate).getDay();
    const endDatePrev = new Date(year, month, 0).getDate();

    let datesHtml = "";

    for (let i = start; i > 0; i--) {
        const formattedDay = (endDatePrev - i + 1).toString().padStart(2, '0');
        datesHtml += `<li class="inactive">${formattedDay}</li>`;
    }

    for (let i = 1; i <= endDate; i++) {
        let className =
            i === date.getDate() &&
                month === new Date().getMonth() &&
                year === new Date().getFullYear()
                ? 'active'
                : "";


        const formattedDay = i.toString().padStart(2, '0');
        datesHtml += `<li><a class="text-decoration-none ${className}" href="#" id="dias">${formattedDay}</a></li>`;
    }

    for (let i = end; i < 6; i++) {
        const formattedDay = (i - end + 1).toString().padStart(2, '0');
        datesHtml += `<li class="inactive">${formattedDay}</li>`;
    }

    dates.innerHTML = datesHtml;
    header.textContent = `${months[month]} ${year}`;
}



// Seleccionar todos los elementos cuyo id comience con "dias"
function attachEventListeners() {
    const diasElements = document.querySelectorAll('[id^="dias"]');

    diasElements.forEach(dia => {
        dia.addEventListener('click', (event) => {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            handleDiaClick(event.target); // Llamar a una función para manejar el clic
        });
    });
}


function formatFecha(fecha) {
    var mesesEspañol = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var mesesNum = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

    // Reemplazar los meses en la cadena
    for (var i = 0; i < mesesEspañol.length; i++) {
        var regex = new RegExp(mesesEspañol[i], 'g');  // Crear una expresión regular para cada mes
        fecha = fecha.replace(regex, mesesNum[i]);  // Reemplazar el mes en español por el mes numérico
    }

    return fecha;
}

// Función para manejar el clic
function handleDiaClick(element) {
    // Remover el estado activo de todos los días
    document.querySelectorAll('[id^="dias"]').forEach(dia => dia.classList.remove('active'));

    // Agregar la clase activa al día clickeado
    element.classList.add('active');

    const mesSeleccionado = document.getElementById('mes');

    const mes = (mesSeleccionado.textContent.split(" "))[0];

    const año = (mesSeleccionado.textContent.split(" "))[1];

    var fecha = `${año}-${mes}-${element.textContent}`;

    fecha = formatFecha(fecha);

    renderCitas(fecha);
}


function renderCitas(fecha) {
    var listaCitas = document.getElementById('listaCitas');

    if (fecha) {
        // Realizo la llamada AJAX si se proporciona una fecha
        $.ajax({
            url: '/api/fillCitas/' + fecha,
            type: "GET",
            dataType: "json",
            success: function (data) {
                // Limpio la lista de las citas anteriores
                while (listaCitas.firstChild) {
                    listaCitas.removeChild(listaCitas.firstChild);
                }

                // Por cada cita en la colección 'data'
                $.each(data, function (key, value) {
                    var mascotaNombre = value.mascota ? value.mascota.nombre : 'Nombre no disponible';
                    var clienteNombre = value.cliente ? value.cliente.nombre : 'Cliente no disponible';
                    var hora = value.hora || 'Hora no disponible';

                    var id = value.id || 'Id no disponible';

                    var url = citaUrl.replace(':id', id);

                    listaCitas.insertAdjacentHTML('beforeend', `
                        <a class="text-decoration-none rounded" href="${url}" id="citas">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">Cita para ${mascotaNombre} de ${clienteNombre}</div>
                          </div>
                          <span class="badge text-bg-primary rounded-pill">${hora}</span>
                        </li>
                        </a>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error("No hay citas disponibles:", error);
                while (listaCitas.firstChild) {
                    listaCitas.removeChild(listaCitas.firstChild);
                }
            }
        });
    } else {
        // Si no se proporciona una fecha, se limpia la lista de citas
        while (listaCitas.firstChild) {
            listaCitas.removeChild(listaCitas.firstChild);
        }
    }
}


navs.forEach((nav) => {
    nav.addEventListener("click", (e) => {
        const btnId = e.target.id;

        if (btnId === "prev" && month === 0) {
            year--;
            month = 11;
        } else if (btnId === "next" && month === 11) {
            year++;
            month = 0;
        } else {
            month = btnId === "next" ? month + 1 : month - 1;
        }

        date = new Date(year, month, new Date().getDate());
        year = date.getFullYear();
        month = date.getMonth();

        renderCalendar();
        attachEventListeners();
    });
});

renderCalendar();
attachEventListeners();