<?php

require_once '../../class/Pedido.php';

const PEDIDO_GUARDADO = 1;
const PEDIDO_MODIFICADO = 2;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoPedidos = Pedido::obtenerTodo();



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
            <h1 class="m-0 text-dark">Listado de Pedidos</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">

                <a class="btn btn-outline-primary btn-sm" href="../facturas/listado.php">
                  <i class="fas fa-file-invoice-dollar"></i>
                  Facturaciones
                </a>
              </li>   
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == PEDIDO_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pedido guardado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == PEDIDO_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pedido actualizado correctamente.</strong>
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
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Nuevo Pedido</a>
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>

                      <th>Nro. Pedido</th>
						          <th>Cliente</th>
                     
                      <th>Fecha Pedido</th>
                      <th>Estado</th>
                      <th>Total</th>
                      <th>Facturar</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoPedidos as $pedido): ?>

                  	<tbody>
                  
                      <tr>
						            <th> <?php echo $pedido->getIdPedido(); ?> </th>
						            <td> <?php echo $pedido->cliente; ?> </td>
                        <td> <?php echo $pedido->getFechaPedido(); ?> </td>

                        <?php  

                        if ($pedido->estadoPedido->getIdPedidoEstado() == 1) {

                          echo "<td><span class='badge bg-warning'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == 2) {

                          echo "<td><span class='badge bg-danger'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == 3) {

                          echo "<td><span class='badge bg-success'>". $pedido->estadoPedido ."</span></td>";
                          
                        }


                        ?>
                     
                        <td> <?php echo $pedido->calcularTotal(); ?> </td>

                        <td>
                          
                        <?php if($pedido->estadoPedido->getIdPedidoEstado() == 1) : ?>
                          <a class='btn btn-primary btn-sm'  role='button' title='facturar' href='../facturas/alta.php?id=<?php echo $pedido->getIdPedido(); ?>'>
                            <i class='fas fa-file-invoice-dollar'></i>
                          </a>
                          
                        <?php elseif ($pedido->estadoPedido->getIdPedidoEstado() == 3): ?>
                          <a class='btn btn-success btn-sm'  role='button' title='facturar' href='#'>
                            <i class="fas fa-check"></i>
                          </a>

                        <?php else: ?>
                          <a class='btn btn-danger btn-sm'  role='button' title='facturar' href='#'>
                            <i class="fas fa-times"></i>
                          </a>
                        
                        <?php endif?>

                        </td>
                      
                        <td> 

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $pedido->getIdPedido(); ?>" role="button" title="Ver">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $pedido->getIdPedido(); ?>" role="button" title="Ver">
                            <i class="fas fa-edit"></i>
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
