<?PHP 
require_once "../../funciones/autoload.php";


    $postData = $_POST;
    $postData['rol'] = 'usuario';
    $errors = [];

    // Validar el nombre de usuario
    if (empty($postData['nombre_usuario'])) {
        $errors[] = "El campo nombre de usuario es obligatorio.";
    }

    // Validar el nombre completo
    if (empty($postData['nombre_completo'])) {
        $errors[] = "El campo nombre completo es obligatorio.";
    } elseif (strlen($postData['nombre_completo']) < 6) {
        $errors[] = "Tu nombre completo debe tener al menos 5 caracteres.";
    }

    // Validar la contraseña
    if (empty($postData['contrasena'])) {
        $errors[] = "El campo contraseña es obligatorio.";
    } elseif (strlen($postData['contrasena']) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Validar el teléfono
    if (empty($postData['telefono'])) {
        $errors[] = "El campo telefono es obligatorio.";
    } elseif (!preg_match('/^\d{8,15}$/', $postData['telefono'])) {
        $errors[] = "El número de telefono debe contener entre 8 y 15 dígitos.";
    }

    // Si no hay errores, insertar el usuario
    if (empty($errors)) {
        try {
            Usuario::insert(
                $postData['nombre_usuario'],
                $postData['nombre_completo'],
                $postData['contrasena'],
                (int)$postData['telefono'],
                $postData['rol']
            );
            Alerta::anadir_alerta('success', "Tu cuenta fue creada correctamente.");
        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                Alerta::anadir_alerta('danger', "Ya existe una persona con ese usuario. Por favor, intenta nuevamente.");
            } else {
                Alerta::anadir_alerta('danger', "La cuenta no se pudo crear. Contáctanos mediante nuestro correo electrónico.");
            }
        }
        header('Location: ../../index.php?seccion=login');
        exit();
    } else {
        // Mostrar los errores si los hay
        foreach ($errors as $error) {
            Alerta::anadir_alerta('danger', $error);
        }
        header('Location: ../../index.php?seccion=register');
        exit();
    }

?>