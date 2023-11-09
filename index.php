<?php
    namespace Navidad;

use Navidad\controladores\ControladorRegalo;
use Navidad\controladores\ControladorUsuario;

    //empezar la sesion
    session_start();
    
  
    //Autocargar las clases --------------------------
    spl_autoload_register(function ($class) {
        //echo substr($class, strpos($class,"\\")+1);
        $ruta = substr($class, strpos($class,"\\")+1);
        $ruta = str_replace("\\", "/", $ruta);
        include_once "./" . $ruta . ".php"; 
    });
    //Fin Autcargar --

    //enrrutador
    if(isset($_SESSION["id"])) {
        if(isset($_REQUEST)) {
            //gestionar request
            if(isset($_REQUEST["accion"])) {
    
            } else {
            
                ControladorRegalo::mostrarRegalos($_SESSION["id"]);
                
            }
            
        }

    } else {
        

        if(isset($_REQUEST["accion"])) {
    
            //accion peticionLogin
            if(strcmp($_REQUEST["accion"],"peticionLogin") == 0) {

                $nombre = $_REQUEST["nombre"];
                $password = $_REQUEST["password"];

                ControladorUsuario::gestionarLogin($nombre,$password);
            }
        } else {
            //enviar a logearse
            ControladorUsuario::mostrarLogin();
        }

        
    }

?>