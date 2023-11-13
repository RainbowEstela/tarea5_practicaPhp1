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

                if(strcmp($_REQUEST["accion"],"mostrarRegalos") == 0) {

                    //mostrar pagina principal
                    ControladorRegalo::mostrarRegalos($_SESSION["id"]);

                } elseif(strcmp($_REQUEST["accion"],"cerrarSesion") == 0) {

                    //cerrar sesion
                    ControladorUsuario::cerrarSesion();

                } elseif(strcmp($_REQUEST["accion"],"peticionAddRegalo") == 0) {

                    //añadir regalo
                    $nombre = $_REQUEST["nombre"];
                    $destinatario = $_REQUEST["destinatario"];
                    $precio = $_REQUEST["precio"];
                    $estado = $_REQUEST["estado"];
                    $year = $_REQUEST["year"];
                    $idUsuario = $_SESSION["id"];

                    ControladorRegalo::addRegalo($nombre,$destinatario,$precio,$estado,$year,$idUsuario);

                } elseif(strcmp($_REQUEST["accion"],"modificarRegaloForm") == 0) {
                    //mostrar formulario de modificacion de un regalo
                    $idRegalo = $_REQUEST["idRegalo"];

                    ControladorRegalo::modificarRegaloForm($idRegalo);

                } elseif(strcmp($_REQUEST["accion"],"modificarRegalo") == 0) {

                    //datos del regalo
                    $id = $_REQUEST["id"];
                    $nombre = $_REQUEST["nombre"];
                    $destinatario = $_REQUEST["destinatario"];
                    $precio = $_REQUEST["precio"];
                    $estado = $_REQUEST["estado"];
                    $year = $_REQUEST["year"];

                    ControladorRegalo::modificarRegalo($id,$nombre,$destinatario,$precio,$estado,$year);

                } elseif(strcmp($_REQUEST["accion"],"borrarRegalo") == 0) {
                    //borrar regalo
                    $idRegalo = $_REQUEST["idRegalo"];

                    ControladorRegalo::borrarRegalo($idRegalo);

                } else {

                    //si no es ninguna accion le mostramos la pagina principal
                    ControladorRegalo::mostrarRegalos($_SESSION["id"]);

                }
    
            } else {
                
                //si no llega una accion pero esta logeado mostramos la pagina principal
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
            } else {
                //enviar a logearse
                ControladorUsuario::mostrarLogin();
            }
        } else {
            //enviar a logearse
            ControladorUsuario::mostrarLogin();
        }

        
    }

?>