<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $turno = Turno::turno_por_id($id);
    $turno->delete();
    Alerta::anadir_alerta('success', "El turno fue cancelado correctamente");
} catch (Exception $e) {
    Alerta::anadir_alerta('danger', "El turno no se pudo cancelar");
}

if ($_SESSION['loggedIn']['rol'] == 'admin'){
    header('Location: ../index.php?seccion=turnos');
} else {
    header('Location: ../../index.php?seccion=turnos');
}