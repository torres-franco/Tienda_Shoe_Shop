<?php

require_once '../../class/Factura.php';
require_once '../../class/Motivo.php';

$id = $_GET['id'];

$factura = Factura::obtenerPorId($id);
$listadoMotivo = Motivo::obtenerTodos();
//highlight_string(var_export($factura, true));

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
            <h1 class="m-0 text-dark">Nota de crédito</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="../facturas/listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <h5 class="text-center">
      <div id="mensajeError" class="text-danger"></div>
    </h5>
  
    <form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
    <section class="content">
      <div class="row">
          <div class="col-12">

             <input type="hidden" name="txtIdFactura" id="txtIdFactura" value="<?php echo $factura->getIdFactura(); ?>">
             <input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $factura->pedido->getIdPedido(); ?>">
            
            <!-- /.card -->

            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-gifts"></i> SHOE SHOP

                    <hr/>
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="txtFecha">Fecha Nota crédito:</label>
                  <input type="date" class="form-control" name="txtFecha" id="txtFecha" value="<?php echo date("Y-m-d");?>">

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="cboMotivo">Motivo:</label>

                    <select name="cboMotivo" class="form-control" id="cboMotivo">

                        <option value="0">Seleccionar</option>

                        <?php foreach ($listadoMotivo as $motivo): ?>

                          <option value="<?php echo $motivo->getIdMotivo(); ?>">
                            <?php echo utf8_encode($motivo); ?>
                          </option>

                        <?php endforeach ?>

                    </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="txtObservacion">Observación:</label>
                    <textarea type="text" class="form-control" name="txtObservacion" id="txtObservacion"></textarea>

                </div>
              </div>

            </div>
            <hr/>
                    
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-5 invoice-col">
                  <b>Cliente:</b>
                  <address>
                    
                      <?php echo $factura->pedido->cliente; ?>  
                    
                    <br>
                    <b>Dirección:</b>
                    <br>
                      
                        <?php echo $factura->pedido->cliente->direccion; ?>  
                      
                    <br>
                    
                    <?php foreach($factura->pedido->cliente->arrContactos as $contacto) :?>
                    <b>Contacto:</b>
                      <br>
                        
                          <?php echo utf8_encode($contacto); ?>
                        
                      <br>
                    <?php endforeach ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-5 invoice-col">
                  <b>Nro. Pedido:</b> <?php echo $factura->pedido->getIdPedido(); ?><br>
                  <b>Nro. Factura:</b> <?php echo $factura->getNumero(); ?><br>
                  <b>Tipo Factura:</b> <?php echo $factura->getTipo(); ?><br>
                </div>

                <div class="col-sm-2 float-sm-right">
                      <b>Fecha del pedido:</b> 
                        
                        <?php echo $factura->pedido->getFechaPedido(); ?>
                      <b>Fecha de Facturación:</b> 
                        
                        <?php echo $factura->getFechaEmision(); ?> 
                     
                </div>


                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped text-center">

                    <thead>
                      <tr>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Importe Unitario</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach($factura->pedido->getArrDetallePedido() as $detallePedido) :?>
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
                 
                </div>
                <!-- /.col -->
               

                <div class="col-6 mt-3 pt-3">
                  <p class="lead">Monto a pagar</p>

                  <div class="table-responsive">
                    <table class="table">
                    
                    
                      <tr>
                        <th>Total:</th>
                        <td>$ <?php echo $factura->pedido->calcularTotal(); ?></td>
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
                  <!--<a href="imprimirFactura.php?id=<?php /*echo $pedido->getIdPedido();*/ ?>" target="_blank" class="btn btn-default">
                    <i class="fas fa-print"></i> Imprimir
                  </a>-->

                   <input class="btn btn-primary float-right" type="button" onclick="validarDatosNotaCredito();" value="Anular">

                  <!--<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
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