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
        $script = "";
    
        if ($alerta['tipo'] == 'success') {
            $script = "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '{$alerta['mensaje']}'
                        });
                    </script>";
        } elseif ($alerta['tipo'] == 'danger') {
            $script = "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{$alerta['mensaje']}'
                        });
                    </script>";
        } elseif ($alerta['tipo'] == 'warning') {
            $script = "<script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Aviso',
                            text: '{$alerta['mensaje']}'
                        });
                    </script>";
        }
    
        return $script;
    }
}