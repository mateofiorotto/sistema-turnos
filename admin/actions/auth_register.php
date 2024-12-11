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
    Alerta::anadir_alerta('danger', "Tu cuenta no se pudo crear. Reintentalo.");
}
header('Location: ../../index.php?seccion=register');
?>