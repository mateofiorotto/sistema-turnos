<?PHP

class Alerta
{

    /**
     * Registra una alerta en el sitema, guardandola en la sesión
     * @param string $tipo el tipo de alerta, pueden ser -> danger (error) / warning (aviso) / success (acción completada correctamente)
     * @param string $mensaje El contenido de la alerta
     */
    public static function anadir_alerta(string $tipo, string $mensaje) {

        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];

    }

    /**
     * Vacia la lista de alertas
     */
    public static function limpiar_alertas() {
        $_SESSION['alertas'] = [];
    }

    /**
     * Devuelve todas las alertas acumuladas en el sistema, y vacia la lista
     * @return string 
     */
    public static function obtener_alertas() {

        if (!empty($_SESSION['alertas'])) {

            $alertasActuales = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasActuales .= self::mostrar_alerta($alerta);
            }
            self::limpiar_alertas();
            return $alertasActuales;
            
        }else {
            return null;
        }

    }


    private static function mostrar_alerta($alerta): string
    {
        $html = "<div class='mb-5 alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";    

        return $html;
    }
}