<?PHP
require_once "../../funciones/autoload.php";

$postData = $_POST;
$errors = [];

    // Validar el nombre de usuario
    if (empty($postData['nombre_usuario'])) {
        $errors[] = "El campo nombre de usuario es obligatorio.";
    }

    // Validar la contraseña
    if (empty($postData['contrasena'])) {
        $errors[] = "El campo contraseña es obligatorio.";
    } 

    if (empty($errors)) {

    $login = Autenticacion::log_in($postData['nombre_usuario'], $postData['contrasena']);

    if ($login) {

        if($login == "usuario"){ 
            header('location: ../../index.php');
        }else{
            header('location: ../index.php?seccion=turnos');
        }
    } else {
        header('location: ../../index.php?seccion=login');
    }
} else {
    header('location: ../../index.php?seccion=login');
    foreach ($errors as $error) {
        Alerta::anadir_alerta('danger', $error);
    }
}