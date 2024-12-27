<?php 
require_once "../../funciones/autoload.php";

$postData = $_POST;
$userId = $_SESSION['loggedIn']['id'];

$feriados = [
    '2024-01-01',  // Año Nuevo
    '2024-12-25',  // Navidad
    // Agregar más feriados según sea necesario
];

$fecha_turno = $postData['fecha_turno'] . ':00';

if ($fecha_turno == ':00' OR $fecha_turno == '') {
    Alerta::anadir_alerta('danger', "La fecha del turno no es válida. Por favor, revisa la selección.");
    header('Location: ../../index.php?seccion=turnos');
} else {
    $timezone = new DateTimeZone('America/Argentina/Buenos_Aires');
    $fecha = new DateTime($fecha_turno, $timezone);

// Verificar si es fin de semana
if ($fecha->format('N') >= 6) {
    // Si es fin de semana, no hay turno
    Alerta::anadir_alerta('danger', "No se pueden reservar turnos durante el fin de semana.");
} else {
    // Verificar que la hora esté entre las 9 AM y las 6 PM
    $hora = $fecha->format('H');
    if ($hora >= 9 && $hora <= 18) {
        // Verificar si es un feriado
        if (in_array($fecha->format('Y-m-d'), $feriados)) {
            // Si es feriado, no se puede hacer el turno
            Alerta::anadir_alerta('danger', "No se puede hacer un turno en un feriado.");
        } else {
            // Verificar si ya existe un turno en la misma fecha y hora
            if (Turno::comprobar_turno($fecha_turno)) {
                // Si ya existe un turno en esa fecha y hora, mostrar alerta
                Alerta::anadir_alerta('danger', "Ya existe un turno reservado en esa fecha y hora. Por favor, selecciona otra.");
            } else {
                // Si no existe turno, se puede insertar el nuevo turno
                try {
                    Turno::insert(
                        $userId,
                        $fecha_turno,
                        (new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires')))->format("Y-m-d H:i:s"),
                    );
                    Alerta::anadir_alerta('success', "Tu turno fue solicitado. Recibirás un recordatorio por Whatsapp antes del mismo.");
                } catch (Exception $e) {
                    // En caso de error al insertar el turno
                    Alerta::anadir_alerta('danger', "Error al solicitar el turno.");
                }
            }
        }
    } else {
        // Si la hora no está en el rango válido
        Alerta::anadir_alerta('danger', "El horario seleccionado no es válido. Solo se pueden reservar turnos entre las 9 AM y 6 PM.");
    }
}
}

// Redirigir a la página de turnos después de la validación
header('Location: ../../index.php?seccion=turnos');
?>
