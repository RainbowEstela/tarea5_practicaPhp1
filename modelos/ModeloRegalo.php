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
    }
?>