<?php

require_once '../../class/Pedido.php';

$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);

//highlight_string(var_export($pedido, true));
//exit;

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
            <h1 class="m-0 text-dark">Detalle del pedido</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
	
	    
    <section class="content">
      <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-gifts"></i> SHOE SHOP
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
                    
                      <?php echo $pedido->cliente; ?>  
                    
                    <br>
                    <b>Dirección:</b>
                    <br>
                      
                        <?php echo $pedido->cliente->direccion; ?>  
                      
                    <br>
                    
                    <?php foreach($pedido->cliente->arrContactos as $contacto) :?>
                    <b>Contacto:</b>
                      <br>
                        
                          <?php echo utf8_encode($contacto); ?>
                        
                      <br>
                    <?php endforeach ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-5 invoice-col">
                  <b>Nro. Pedido:</b> <?php echo $pedido->getIdPedido(); ?><br>
                  <b>Estado:</b><?php echo $pedido->estadoPedido; ?><br>
                </div>

                <div class="col-sm-2 float-sm-right">
                      <b>Fecha de pedido:</b> 
                        
                        <?php echo $pedido->getFechaPedido(); ?> 
                     
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
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Importe Unitario</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach($pedido->getArrDetallePedido() as $detallePedido) :?>
                      <tr>
                        
                        <td> 
                          <?php echo $detallePedido->producto->categoria->getDescripcion(); ?>

                          <?php echo $detallePedido->producto->marca->getDescripcion(); ?>
                          <?php echo $detallePedido->producto->getDescripcion(); ?>

                        </td>

                        <td> 

                          <?php echo $detallePedido->getCantidad(); ?>

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
                  <!--<a href="imprimirFactura.php?id=<?php echo $pedido->getIdPedido(); ?>" target="_blank" class="btn btn-default">
                    <i class="fas fa-print"></i> Imprimir
                  </a>

                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Cobrar
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

  </div>

<?php

include('../../footer.php');

?>


</body>
</html>