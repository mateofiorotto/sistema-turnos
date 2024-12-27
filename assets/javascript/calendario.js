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

