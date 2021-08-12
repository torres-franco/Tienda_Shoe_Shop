<?php

require_once '../../class/Pedido.php';
require_once '../../class/EstadoPedido.php';
require_once '../../class/TipoPago.php';
require_once '../../class/Factura.php';
require_once '../../class/Cliente.php';



$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);

$listadoCliente = Cliente::obtenerTodos();
$listadoEstado = EstadoPedido::obtenerTodos();
$listadoTipoPago = TipoPago::obtenerTodos();

?>

<!doctype html>
<html lang="es">


<?php
  include('../../header.php');
?>

<body>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Facturar pedido</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="../pedidos/listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <?php if (isset($_SESSION['mensaje_error'])) : ?>

    <div class="content">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas text-white fa-exclamation-triangle"></i>
        <strong class="text-white"> <?php echo $_SESSION['mensaje_error'] ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>

            <?php
                unset($_SESSION['mensaje_error']);
                endif;
            ?>

    <h5 class="text-center">
      <div id="mensajeError" class="text-danger"></div>
    </h5>
  
    <form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
    <section class="content">
      <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

          <div class="invoice p-3 mb-3">


          <input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $pedido->getIdPedido(); ?>">

          <input type="hidden" name="cboEstado" value="3">
  
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtFechaEmision">Fecha Facturación:</label>
                  <input type="date" class="form-control" name="txtFechaEmision" value="<?php echo date("Y-m-d");?>">

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtNumero">N° Factura:</label>
                    <input type="number" class="form-control" name="txtNumero" id="txtNumero">

                </div>
              </div>

            </div>
            <div class="row">


              <div class="col-md-6">
                <div class="form-group">
                  <label for="cboTipoPago">Tipo de pago:</label>

                    <select name="cboTipoPago" class="form-control" id="cboTipoPago">

                        <option value="0">Seleccionar</option>

                        <?php foreach ($listadoTipoPago as $tipoPago): ?>

                          <option value="<?php echo $tipoPago->getIdTipoPago(); ?>">
                            <?php echo utf8_encode($tipoPago); ?>
                          </option>

                        <?php endforeach ?>

                    </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cboTipoFactura">Tipo Factura:</label>
                    <select name="cboTipoFactura" class="form-control" id="cboTipoFactura">
                      
                      <option value="0">Seleccionar</option>     
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>

                    </select>
                </div>
              </div>
              
            </div>

              <hr class="bg-info" />
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-5 invoice-col mb-4">
                  <address>
                    <b>Cliente:</b>
                    <?php echo $pedido->cliente; ?>  
                    <br>

                    <b>Dirección:</b>
                    
                    <?php echo $pedido->cliente->direccion; ?>  
                      
                    <br>
                    <?php foreach($pedido->cliente->arrContactos as $contacto) :?>
                      <b>Contacto:</b>
                    
                        <?php echo utf8_encode($contacto); ?>
                    <br>

                    <?php endforeach ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-5 invoice-col">
                  <b>Nro. Pedido:</b> <?php echo $pedido->getIdPedido(); ?><br>
                </div>

                <div class="col-sm-2 float-sm-right">
                      <b>Fecha del pedido:</b> 
                        
                        <?php echo $pedido->getFechaPedido(); ?> 
                     
                </div>


                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped text-center">

                    <thead class="bg-info">
                      <tr>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Importe Unitario</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach($pedido->getArrDetallePedido() as $detallePedido) :?>
                      <tr>
                        <td> 

                          <?php echo $detallePedido->getCantidad(); ?>

                        </td>
                        <td> 
                          <?php echo $detallePedido->producto->categoria->getDescripcion(); ?>

                          <?php echo $detallePedido->producto->marca->getDescripcion(); ?>
                          <?php echo $detallePedido->producto->getDescripcion(); ?>

                        </td>

                        <td>$ 

                          <?php echo $detallePedido->getPrecio(); ?>

                        </td>

                        <td>$ <?php echo $detallePedido->calcularSubtotal(); ?> </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>

                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6 mt-3 pt-3">

                  
                  <p class="lead">Métodos de pagos:</p>
                  <img src="../../static/dist/img/credit/visa.png" alt="Visa">
                  <img src="../../static/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../static/dist/img/credit/paypal2.png" alt="Paypal">
                 
                </div>
                <!-- /.col -->
               

                <div class="col-6 mt-3 pt-3">
                  <p class="lead">Monto a pagar</p>

                  <div class="table-responsive">
                    <table class="table">
                    
                    
                      <tr>
                       
                        <th>Total:</th>
                        <td>$ <?php echo $pedido->calcularTotal(); ?></td>

                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print mt-3 pt-3">
                <div class="col-12">
                  <!--<a href="#" class="btn btn-info">
                    <i class="fas fa-print"></i> Imprimir Factura
                  </a>-->

                  <input class="btn btn-primary float-right" type="button" onclick="validarDatosFactura();" value="Facturar">
                  <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Cobrar
                  </button>

                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                  </button>-->

                </div>
              </div>

            </div>
        </div>
  
      </div>

    </section>
  </form>

  </div>

<?php

include('../../footer.php');

?>


</body>
</html>