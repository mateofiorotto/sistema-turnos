let userIcon = document.getElementById("user-icon");
let dropDownUser = document.getElementById("dropdown-user");

function mostrarMenu() {
    dropDownUser.classList.toggle('d-none');
}

if (userIcon) {
    userIcon.addEventListener("click",mostrarMenu);
}
// Lista de feriados
const feriados = [
    '2024-01-01',
    '2024-12-25',
    // Agrega otros feriados aquí en formato 'YYYY-MM-DD'
];

// Función para deshabilitar fines de semana y feriados
function deshabilitarFeriadosYFinesDeSemana(date) {
    // Deshabilita los fines de semana (sábado 6 y domingo 0)
    if (date.getDay() === 0 || date.getDay() === 6) {
        return true; // Deshabilita sábado (6) y domingo (0)
    }

    // Deshabilita los días feriados
    const fechaFormateada = flatpickr.formatDate(date, "Y-m-d");
    if (feriados.includes(fechaFormateada)) {
        return true; // Deshabilita los días feriados
    }

    return false; // Permite el día si no es fin de semana ni feriado
}

// Configuración de flatpickr
flatpickr("#fecha_turno", {
    enableTime: true, // Habilita la selección de la hora
    dateFormat: "Y-m-d H:i", // Formato de fecha y hora
    minDate: "today", // Deshabilita fechas anteriores a hoy
    disable: [
        deshabilitarFeriadosYFinesDeSemana // Deshabilita fines de semana y feriados
    ],
    // Deshabilita horas fuera del rango de 9 AM a 6 PM
    onChange: function(selectedDates, dateStr, instance) {
        // Obtén la hora seleccionada
        const selectedHour = selectedDates[0].getHours();

        // Si la hora es menor a 9 AM o mayor o igual a 6 PM, deshabilita la selección
        if (selectedHour < 9 || selectedHour >= 18) {
            // Deshabilita la hora seleccionada
            instance.clear(); // Borra la selección
            alert("Solo se pueden reservar turnos entre las 9 AM y 6 PM.");
        }
    }
});
