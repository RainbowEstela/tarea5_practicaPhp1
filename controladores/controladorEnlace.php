<?php
    namespace Navidad\controladores;

use Navidad\modelos\ModeloEnlace;
use Navidad\vistas\VistaEnlace;

    class ControladorEnlace {
        public static function mostrarEnlaces($idRegalo) {

            $enlaces = ModeloEnlace::enlacesRegalo($idRegalo);

            VistaEnlace::render($enlaces,$idRegalo);
        }

        public static function addEnlace($nombre,$enlace,$precio,$imagen,$prioridad,$idRegalo) {
            ModeloEnlace::addEnlace($nombre,$enlace,$precio,$imagen,$prioridad,$idRegalo);

            ControladorEnlace::mostrarEnlaces($idRegalo);

        }
    }   
?>