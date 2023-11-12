<?php
    namespace Navidad\controladores;

use Navidad\modelos\ModeloRegalo;
use Navidad\vistas\VistaRegalo;

    class ControladorRegalo {
        public static function mostrarRegalos() {
            $regalos = ModeloRegalo::regalosUsuario($_SESSION["id"]);
            VistaRegalo::render($regalos);
        }


        public static function addRegalo($nombre,$destinatario,$precio,$estado,$year,$idUsuario) {

            ModeloRegalo::addRegalo($nombre,$destinatario,$precio,$estado,$year,$idUsuario);

            ControladorRegalo::mostrarRegalos();
        }
    }



?>