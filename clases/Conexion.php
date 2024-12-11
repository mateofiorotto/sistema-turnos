<?PHP

/**
 * Clase para proveer la conexión de PDO al proyecto.
 */
class Conexion
{

    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'cali_kinesiologia';

    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    private static ?PDO $db = null;

    /**
     * Se realiza la conexion a la BD con su mensaje correspondiente en caso de error
     */
    public static function conectar()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            echo '<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error de Conexión</title>
            <style>
                * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 1em;
            color: #98D9A3;
        }
        p {
            font-size: 1.5em;
            margin-top: 1em;
            color: #C4A484;
        }
        p:last-of-type {
            margin-bottom: 1em;
        }
        .container {
            width: 90%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: auto;
            padding: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
            </style>
        </head>
        <body>
            <section id="error-bd" class="container">
                <h1>Nuestra página esta en mantenimiento</h1>
                <p>Solucionaremos todos los problemas a la brevedad, disculpe las molestias.</p>
                <p>Gracias por comprender.</p>
            </section>
        </body>
        </html>';
            die();
        }
    }

    /**
     * Función que devuelve una conexión PDO lista para usar
     * @return PDO
     */
    public static function getConexion(): PDO
    {
        if (self::$db === null) {
            self::conectar();
        }
        return self::$db;
    }
}