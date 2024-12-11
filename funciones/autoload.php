<?PHP
session_start();

function autoloadClasses($nombreClase){
    $archivoClase = __DIR__ ."/../clases/$nombreClase.php";
   
    
    if(file_exists($archivoClase)){
        require_once  $archivoClase;
    }else{
        die("No se pudo cargar la clase: $nombreClase");
    }
}

spl_autoload_register('autoloadClasses');