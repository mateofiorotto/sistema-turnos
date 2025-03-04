<?php
require_once "funciones/autoload.php";

$idUser = $_SESSION['loggedIn']['id'] ?? FALSE;

$usuario = Usuario::usuario_por_id($idUser);

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'inicio';

$secciones_validas = [
    '404' => [
        'titulo' => 'Pagina no encontrada | CALI',
        'restringido' => 0,
    ],
    'inicio' => [
        'titulo' => "Inicio | CALI",
        'restringido' => 0,
    ],
    'turnos' => [
        'titulo' => "Turnos | CALI",
        'restringido' => 1,
    ],
    'login' => [
        'titulo' => "Iniciar Sesión | CALI",
        'restringido' => 0,
    ],
    'register' => [
        'titulo' => "Registro | CALI",
        'restringido' => 0,
    ]
];

//si la key del array no existe entonces mandarlo a 404
//si no, guardar en la var VISTA el valor de  seccion
if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = '404';
} else {
    $vista = $seccion;

    if ($secciones_validas[$seccion]['restringido']) {
        $nivel = $secciones_validas[$seccion]['restringido'] ?? 0;
        Autenticacion::verificar($nivel);
    }
}

$userData = $_SESSION['loggedIn'] ?? FALSE;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your website description here.">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Your Open Graph Title">
    <meta property="og:description" content="Your Open Graph Description">
    <meta property="og:image" content="URL_to_image">
    <meta property="og:url" content="Your website URL">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="assets/javascript/calendario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title><?= $secciones_validas[$vista]['titulo'] ?></title>
</head>

<body>
    <header class="header">
        <h1 class="d-none"><?= $secciones_validas[$vista]['titulo'] ?></h1>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">

                
                <button class="mx-auto navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav mx-auto gap-4 align-middle justify-content-center align-items-center">
                        <li><a class="navbar-brand" href="index.php?seccion=inicio">Navbar</a></li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?seccion=inicio"><i class="me-2 fa-solid fa-home"><span>Icono Inicio</span></i>Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?seccion=turnos"><i class="me-2 fa-solid fa-calendar-days"><span>Icono Turnos</span></i>Turnos</a>
                        </li>
                            <?php
                                if ($userData) {
                            ?>
                        <!-- dropdown -->
                        <li class="nav-item">
                            <a id="user-icon" class="nav-link" href="#"><i class="me-2 fa-solid fa-user"><span>Icono usuario</span></i><?= $usuario->getNombre_completo(); ?></a>
                            
                                <ul class="d-none position-absolute" id="dropdown-user">
                                    <li>Login</li>
                                    <li>Login</li>
                                </ul>
                        </li>

                            <?php 
                                if ($userData['rol'] == 'admin'){ ?>
                                <li class="nav-item">
                                <a class="nav-link" href="admin/index.php?seccion=turnos"><i class="me-2 fa-solid fa-list"><span>Icono turnos</span></i>Lista de turnos</a>
                            <?php } ?>

                        <li><a id="login-icon" class="nav-link" href="admin/actions/auth_logout.php"><i class="me-2 fa-solid fa-right-from-bracket"><span>Icono Salir</span></i>Salir</a></li>
                            
                        <?php } else { ?>
                            <li><a id="login-icon" class="nav-link" href="index.php?seccion=register"><i class="me-2 fa-solid fa-pen-to-square"><span>Icono Registro</span></i>Registrarse</a></li>

                            <li><a id="login-icon" class="nav-link" href="index.php?seccion=login"><i class="me-2 fa-solid fa-right-to-bracket"><span>Icono Login</span></i>Iniciar Sesión</a></li>
                        <?php } ?>
                    </ul>

                </div>
            </div>

        </nav>
    </header>
    <main>

        <?php
        require_once "vistas/$vista.php";
        ?>

    </main>
    <footer class="">
        <p>footer</p>
    </footer>
    <script> 
        // Configuración de flatpickr
flatpickr("#fecha_turno", {
    enableTime: true, // Habilita la selección de la hora
    dateFormat: "Y-m-d H:i", // Formato de fecha y hora
    minDate: "today", // Deshabilita fechas anteriores a hoy
    disable: [
        deshabilitarFeriadosYFinesDeSemana // Deshabilita fines de semana y feriados
    ],
    // Deshabilita horas fuera del rango de 9 AM a 6 PM
    onChange: function(selectedDates, dateStr, instance) {
        // Obtén la hora seleccionada
        const selectedHour = selectedDates[0].getHours();

        // Si la hora es menor a 9 AM o mayor o igual a 6 PM, deshabilita la selección
        if (selectedHour < 9 || selectedHour >= 18) {
            // Deshabilita la hora seleccionada
            instance.clear(); // Borra la selección
            alert("Solo se pueden reservar turnos entre las 9 AM y 6 PM.");
        }
    }
});

    </script>
     <script src="assets/javascript/main.js" defer></script>
</body>

</html>