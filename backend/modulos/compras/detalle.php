<?php

require_once '../../class/Compra.php';

$id = $_GET['id'];

$compra = Compra::obtenerPorId($id);

//highlight_string(var_export($compra, true));
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
            <h1 class="m-0 text-dark">Detalle de la compra</h1>
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
                  <b>Proveedor:</b>
                  <address>
                    
                      <?php echo $compra->proveedor; ?>  
                    
                    <br>
                    <b>Dirección:</b>
                    <br>
                      
                        <?php echo $compra->proveedor->direccion; ?>  
                      
                    <br>
                    
                    <?php foreach($compra->proveedor->arrContactos as $contacto) :?>
                    <b>Contacto:</b>
                      <br>
                        
                          <?php echo utf8_encode($contacto); ?>
                        
                      <br>
                    <?php endforeach ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-5 invoice-col">
                  <b>Nro. Compra:</b> <?php echo $compra->getIdCompra(); ?><br>
                  <b>Estado:</b><?php echo $compra->estadoCompra; ?><br>
                </div>

                <div class="col-sm-2 float-sm-right">
                      <b>Fecha Compra:</b> 
                        
                        <?php echo $compra->getFechaCompra(); ?> 
                     
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
                        <th>Importe Compra</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach($compra->getArrDetalleCompra() as $detalleCompra) :?>
                      <tr>
                        <td> 
                          <?php echo $detalleCompra->producto->categoria->getDescripcion(); ?>

                          <?php echo $detalleCompra->producto->marca->getDescripcion(); ?>
                          <?php echo $detalleCompra->producto->getDescripcion(); ?>

                        </td>

                        <td> 

                          <?php echo $detalleCompra->getCantidad(); ?>

                        </td>

                        <td>$ 

                          <?php echo $detalleCompra->getPrecio(); ?>

                        </td>

                        <td>$ <?php echo $detalleCompra->calcularSubtotal(); ?> </td>
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
                        <td>$ <?php echo $compra->calcularTotal(); ?></td>
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