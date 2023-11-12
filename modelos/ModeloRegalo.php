<?php
    namespace Navidad\modelos;

    use Navidad\modelos\ConexionBaseDeDatos;
    use Navidad\modelos\Regalo;
    use \PDO;

    class ModeloRegalo {
        public static function regalosUsuario($idUsuario) {
            $conexionObjet = new ConexionBaseDeDatos();
            $conexion = $conexionObjet->getConexion();

            $consulta = $conexion->prepare("SELECT id,nombre,destinatario,precio,estado,year FROM regalos WHERE idUsuario = ?");
            $consulta->bindValue(1,$idUsuario);

            $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Navidad\modelos\Regalo');
            $consulta->execute();

            $regalos = $consulta->fetchAll();

            $conexionObjet->cerrarConexion();

            return $regalos;
        }


        public static function addRegalo($nombre,$destinatario,$precio,$estado,$year,$idUsuario) {
            $conexionObjet = new ConexionBaseDeDatos();
            $conexion = $conexionObjet->getConexion();

            $consulta = $conexion->prepare("INSERT INTO `navidad`.`regalos` (`nombre`, `destinatario`, `precio`, `estado`, `year`, `idUsuario`) VALUES (?, ?, ?, ?, ?, ?);");

            //bindeo de parametros
            $consulta->bindValue(1,$nombre);
            $consulta->bindValue(2,$destinatario);
            $consulta->bindValue(3,$precio);
            $consulta->bindValue(4,$estado);
            $consulta->bindValue(5,$year);
            $consulta->bindValue(6,$idUsuario);

            $consulta->execute();
            $conexionObjet->cerrarConexion();

        }
    }
?>