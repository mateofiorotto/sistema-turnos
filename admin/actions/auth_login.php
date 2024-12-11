<?PHP
require_once "../../funciones/autoload.php";

$postData = $_POST;

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