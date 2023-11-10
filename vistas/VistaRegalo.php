<?php
    namespace Navidad\vistas;

    use Navidad\modelos\Regalo;

    class VistaRegalo {
        public static function render($regalos) {
          include("cabecera.php");

        echo '
        <main class="container">
          <table class="table table-hover table-striped table-bordered">
            <tr class="table-dark text-center">
              <th>Nombre</th>
              <th>Destinatario</th>
              <th>Precio</th>
              <th>Estado</th>
              <th>Año</th>
              <th>Acciones</th>
            </tr>
        ';
        
        foreach($regalos as $regalo) {

          echo'<tr>';
          echo' <td>'.$regalo->getNombre().'</td>';
          echo' <td>'.$regalo->getDestinatario().'</td>';
          echo' <td>'.$regalo->getPrecio().'</td>';
          echo' <td>'.$regalo->getEstado().'</td>';
          echo' <td>'.$regalo->getYear().'</td>';
          echo' <td>'.$regalo->getId().'</td>';
          echo'</tr>';

        }


        echo'
            </table>

          </main>
          
          
        ';

          include("pie.php");
        }
    }
?>

