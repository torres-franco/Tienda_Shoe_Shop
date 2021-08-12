<?php

require_once '../../class/Factura.php';


const PEDIDO_FACTURADO = 1;


if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">

                <a class="btn btn-outline-primary btn-sm" href="../notasCreditos/listado.php">
                  <i class="fas fa-file-invoice-dollar"></i>
                  Notas de créditos
                </a>
              </li>   
            </ol>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == PEDIDO_FACTURADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pedido facturado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php endif ?>
    

    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a class="btn btn-outline-primary btn-sm" href="../pedidos/listado.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Listado de pedidos
                  </a>

                </h3>

              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover">
                  <thead>
                    <tr>

                      <th>Nro. Factura</th>
						          <th>Fecha de Emisión</th> 
                      <th>Tipo de Factura</th>
                      <th>N° Pedido</th>
                      <th>Estado Pedido</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoFactura as $factura): ?>

                  	<tbody>
                  
                      <tr>
                        <td> <?php echo $factura->getNumero(); ?> </td>
                        <td> <?php echo $factura->getFechaEmision(); ?> </td>
                        <td> <?php echo $factura->getTipo(); ?> </td>
                        <td> <?php echo $factura->pedido->getIdPedido(); ?> </td>
                        <?php

                        if ($factura->pedido->estadoPedido->getIdPedidoEstado() == 4){

                          echo "<td><span class='badge bg-success'>". $factura->pedido->estadoPedido ."</span></td>";

                        }

                        if ($factura->pedido->estadoPedido->getIdPedidoEstado() == 5){

                          echo "<td><span class='badge bg-danger'>". $factura->pedido->estadoPedido ."</span></td>";

                        }

                        ?>
                      
                        <td>
                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $factura->getIdFactura(); ?>">
                           <i class="fas fa-eye"></i>
                          </a>
                          <a class="btn btn-primary btn-sm" href="imprimirFactura.php?id=<?php echo $factura->getIdFactura(); ?>" target="_blank" class="btn btn-info">
                            <i class="fas fa-print"></i>
                          </a>
                          <?php if ($factura->pedido->estadoPedido->getIdPedidoEstado() == 4): ?>
                          <a class="btn btn-danger btn-sm" href="../notasCreditos/alta.php?id=<?php echo $factura->getIdFactura(); ?>" role="button" title="Realizar nota de crédito">
                            <i class="fas fa-file-invoice-dollar"></i>
                          </a>
								           
							          </td>
                          <?php endif ?>
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
