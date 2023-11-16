<?php
    namespace Navidad\controladores;

use Navidad\modelos\ModeloEnlace;
use Navidad\vistas\VistaEnlace;

    class ControladorEnlace {
        public static function mostrarEnlaces($idRegalo) {

            $enlaces = ModeloEnlace::enlacesRegalo($idRegalo);

            VistaEnlace::render($enlaces,$idRegalo);
        }

        public static function mostrarEnlacesAsc($idRegalo) {
            $enlaces = ModeloEnlace::enlacesRegaloAsc($idRegalo);

            VistaEnlace::render($enlaces,$idRegalo,"asc");
        }

        public static function mostrarEnlacesDes($idRegalo) {
            $enlaces = ModeloEnlace::enlacesRegaloDes($idRegalo);

            VistaEnlace::render($enlaces,$idRegalo,"des");
        }

        public static function addEnlace($nombre,$enlace,$precio,$imagen,$prioridad,$idRegalo) {
            ModeloEnlace::addEnlace($nombre,$enlace,$precio,$imagen,$prioridad,$idRegalo);

            ControladorEnlace::mostrarEnlaces($idRegalo);

        }

        public static function borrarEnlace($idEnlace,$idRegalo) {
            ModeloEnlace::borrarEnlace($idEnlace);

            ControladorEnlace::mostrarEnlaces($idRegalo);
        }
    }   
?>