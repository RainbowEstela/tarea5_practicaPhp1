<?php
    namespace Navidad\vistas;

    class VistaEnlace {
        public static function render($enlaces,$idRegalo) {
            include("cabecera.php");


            //contenido principal
            echo' <main class="container ">';
            echo '
            <div class="d-flex justify-content-center p-4">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir</button>  
            </div>
            
            ';
  
            if($enlaces == null) {
              echo '
              <h3 class="text-center text-info">Aun no tiene enlaces para este regalo</h3>
              </main>
              ';
            } else {
  
              echo '
              <main class="container">
                <table class="table table-hover table-striped table-bordered">
                  <tr class="table-dark text-center">
                    <th>Nombre</th>
                    <th>Enlace</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Prioridad</th>
                    <th>Acciones</th>
                  </tr>
              ';
            
              foreach($enlaces as $enlace) {
  
                echo'<tr>';
                echo' <td>'.$enlace->getNombre().'</td>';
                echo' <td>'.$enlace->getEnlace().'</td>';
                echo' <td>'.$enlace->getPrecio().'</td>';
                echo' <td>'.$enlace->getImagen().'</td>';
                echo' <td>'.$enlace->getPrioridad().'</td>';
                echo' <td class="d-flex justify-content-center">
                  <a href="index.php?accion=borrarEnlace&idEnlace='.$enlace->getId().'"><button class="btn btn-danger">x</button></a>
                </td>
                ';
                echo'</tr>';
  
              }
    
    
              echo'</table>';
  
            }
  
            echo '</main>';
            //fin contenido principal
  
  
  
            //modal
            echo '
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir un nuevo Regalo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  
                  <form action="index.php" method="POST" id="formAddEnlace">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="tu nombre" required>
                      <label for="inputNombre">Nombre del Enlace</label>
                    </div>
  
                    <div class="form-floating">
                      <input type="text" class="form-control" id="inputDest" name="enlace" placeholder="tu nombre" required>
                      <label for="inputDest">Enlace web/a</label>
                    </div>
  
                    <div class="form-floating">
                      <input type="number" step="any" class="form-control" id="inputPrecio" name="precio" placeholder="tu nombre" min="0" max="9999" required>
                      <label for="inputPrecio">Precio</label>
                    </div>
  
                    <div class="form-floating">
                      <input type="text" class="form-control" id="inputImg" name="imagen" placeholder="tu nombre">
                      <label for="inputImg">Imagen</label>
                    </div>
  
                    <div class="form-floating">
                      <input type="number" class="form-control" id="inputPrioridad" name="prioridad" placeholder="tu nombre" min="1" max="5" required>
                      <label for="inputPrioridad">prioridad</label>
                    </div>

                    <input type="hidden" name="idRegalo" value="'.$idRegalo.'">
  
                  </form>
  
  
  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" name="accion" value="peticionAddEnlace" form="formAddEnlace">Añadir</button>
                  </div>
                </div>
              </div>
            </div>
            ';
            //fin modal
  
            include("pie.php");
        }
    }
?>

