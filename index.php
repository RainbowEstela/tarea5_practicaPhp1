<?php
    namespace Navidad;

    use Navidad\controladores\ControladorUsuario;

    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php"; 
    });
    //Fin Autcargar --

    //enrrutador
    if(isset($_REQUEST)) {
        //gestionar request
    } else {

        //enviar a logearse
    }
?>