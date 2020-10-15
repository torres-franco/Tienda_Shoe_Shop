<?php

require_once '../../class/Pedido.php';

$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);

//highlight_string(var_export($pedido, true));
//exit;

?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shoe Shop</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../static/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
      <!-- Content Header (Page header) -->
	    
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
                  <b>Tipo de pago:</b> <?php echo $pedido->getMetodoPago(); ?><br>
                  <b>Estado:</b> <?php echo $pedido->estadoPedido; ?><br>
                </div>

                <div class="col-sm-2 float-sm-right">
                      <b>Fecha emisión:</b> 
                        
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
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Color</th>
                        <th>Talle</th>
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
                        <td> 

                          <?php echo $detallePedido->producto->color->getDescripcion(); ?>
                          
                        </td>
                        <td> 

                          <?php echo $detallePedido->producto->talle->getDescripcion(); ?>
   
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
              
            </div>
        </div>
  
      </div>

    </section>
    <p class="text-center">No válido como factura</p>

  </div>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>