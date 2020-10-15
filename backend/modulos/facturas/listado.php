<?php

require_once '../../class/Factura.php';


$listadoFactura = Factura::obtenerTodos();

//highlight_string(var_export($listadoFactura, true));
//exit;



?>

<!DOCTYPE html>
<html lang="es">



<body>

  <?php

  include('../../header.php');

  ?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado de Facturas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Nuevo Pedido</a>
                </h3>

                
              </div>-->
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>

                      <th>Nro. Factura</th>
						          <th>Fecha de Emisión</th> 
                      <th>Tipo Factura</th>
                      <th>N° Pedido</th>
                      <th>Estado Pedido</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoFactura as $factura): ?>

                  	<tbody>
                  
                      <tr>
                        <td> <?php echo $factura->getNumero(); ?> </td>
                        <td> <?php echo $factura->getFechaEmsion(); ?> </td>
                        <td> <?php echo $factura->getTipo(); ?> </td>
                        <td> <?php echo $factura->pedido->getIdPedido(); ?> </td>
                        <?php

                        if ($factura->pedido->estadoPedido->getIdPedidoEstado() == 3){

                          echo "<td><span class='badge bg-success'>". $factura->pedido->estadoPedido ."</span></td>";

                        }

                        ?>
                      
                        <td>

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $factura->getIdFactura(); ?>" role="button" title="Ver">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a class="btn btn-danger btn-sm" href="notaCredito.php?id=<?php echo $factura->getIdFactura(); ?>" role="button" title="Realizar nota de crédito">
                            <i class="fas fa-file-invoice-dollar"></i>
                          </a>
								           
							          </td>
						          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

</section>

</div>
	
<?php 
	include('../../footer.php');
?>

</body>
</Colores