<?PHP 
require_once "../../funciones/autoload.php";

$postData = $_POST;
$postData['rol'] = 'usuario';

try {

    Usuario::insert(
        $postData['nombre_usuario'],
        $postData['nombre_completo'],
        $postData['contrasena'],
        (int)$postData['telefono'],
        $postData['rol'],
    );
    
    Alerta::anadir_alerta('success', "Tu cuenta fue creada. <a href='index.php?seccion=login'>Iniciar Sesión</a>.");
} catch (Exception $e) {
    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "Ya existe una persona con ese usuario. Reintentalo.");
    }else{
        Alerta::anadir_alerta('danger', "La cuenta no se pudo crear. Ponete en contacto mediante nuestro mail.");
    }
}
header('Location: ../../index.php?seccion=register');
?>