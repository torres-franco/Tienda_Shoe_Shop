<?php 

require_once '../../class/EstadoPedido.php';
require_once '../../class/Pedido.php';

$listadoEstado = EstadoPedido::obtenerTodos();


?>

<div class="modal fade" id="estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="procesar/actualizarEstado.php" method="POST">

            <input type="hidden" name="txtIdPedido" id="txtIdPedido">


                <select name="cboEstado" class="form-control" id="cboEstado">

                  <?php foreach ($listadoEstado as $estadoPedido):
                    $selected = '';
                    
                    if ($pedido->getIdPedidoEstado() == $estadoPedido->getIdPedidoEstado()) {
                      
                        $selected = "SELECTED";
                    
                    }
                  ?>
                
                  <option value="<?php echo $estadoPedido->getIdPedidoEstado(); ?>"
                    <?php echo $selected; ?>>
                    <?php echo $estadoPedido; ?>

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
