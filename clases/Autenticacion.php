<?PHP

class Autenticacion
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas, guarda los datos en la sesión
     * @param string $usuario El nombre de usuario provisto
     * @param string $contrasena la contraseña provisto
     * @return mixed Devuelve el rol en caso que las credenciales sean correctas, FALSE en caso de que no lo sean y Null en caso que el usuario no se encuentre en la BDD
     */
    public static function log_in(string $usuario, string $contrasena)
    {

        $datosUsuario = Usuario::usuario_x_username($usuario);
        print_r($datosUsuario);
        if ($datosUsuario) {
            print_r($datosUsuario->getContrasena());
            if (password_verify($contrasena, $datosUsuario->getContrasena())) {

                $datosLogin['nombre_usuario'] = $datosUsuario->getNombre_usuario();
                $datosLogin['nombre_completo'] = $datosUsuario->getNombre_completo();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();

                $_SESSION['loggedIn'] = $datosLogin;
                return $datosLogin['rol'];
            } else {
                Alerta::anadir_alerta('danger', "La contraseña ingresada es incorrecta.");
                return FALSE;
            }
        } else {
            Alerta::anadir_alerta('warning', "El usuario no esta registrado.");
            return NULL;
        }
    }

    /*LOG OUT */
    public static function log_out()
    {

        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }


        /* VERIFICAR CREDENCIALES*/

    public static function verificar($nivel = 0): bool
    {

        if (!$nivel) { //RESTRICCION NIVEL 0 - ACCESO PÚBLICO
            return TRUE; //SIGA PARA ADELANTE!
        }

        if (isset($_SESSION['loggedIn'])) { //RESTRICCION NIVEL 1 o + - ACCESO RESTRINGIDO
           
            if ($nivel > 1) {//RESTRICCION NIVEL 2 - ACCESO ADMINISTRADOR
                
                if ($_SESSION['loggedIn']['rol'] == "admin" ) {
                    //seguir
                    return TRUE;
                } else {
                    Alerta::anadir_alerta('danger', "No tiene permisos para acceder a esta sección. Inicia como Administrador.");
                    header('location: ../index.php?seccion=login');
                }

            } else {
                //seguir
                return TRUE;
            }

        } else {
            Alerta::anadir_alerta('warning', "Entra en tu cuenta para acceder a esta sección.");
            header("location: index.php?seccion=login");
        }
    }

    
}