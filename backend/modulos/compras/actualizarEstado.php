<?php 

require_once '../../class/EstadoCompra.php';
require_once '../../class/Compra.php';

$listadoEstadoCompra = EstadoCompra::obtenerTodos();


?>

<div class="modal fade" id="estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar estado:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <strong class="text-center bg-warning">
        <i class="fas fa-exclamation-triangle"></i>
        ADVERTENCIA: Una vez confirmada/anulada la compra, no podrás editar la misma.
      </strong>
      <div class="modal-body">

        <form action="procesar/actualizarEstado.php" method="POST">

            <input type="hidden" name="txtIdCompra" id="txtIdCompra">


                <select name="cboEstado" class="form-control" id="cboEstado">

                  <?php foreach ($listadoEstadoCompra as $estadoCompra):
                    $selected = '';
                    
                    if ($compra->getIdEstadoCompra() == $estadoCompra->getIdEstadoCompra()) {
                      
                        $selected = "SELECTED";
                    
                    }
                  ?>
                
                  <option value="<?php echo $estadoCompra->getIdEstadoCompra(); ?>"
                    <?php echo $selected; ?>>
                    <?php echo $estadoCompra; ?>

                  </option>

                  <?php endforeach ?>

              </select>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cambiar</button>
        </div>

      </form>
    </div>
  </div>
</div>