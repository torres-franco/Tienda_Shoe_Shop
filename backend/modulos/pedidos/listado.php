<?php

require_once '../../class/Pedido.php';
require_once '../../class/EstadoPedido.php';


const PEDIDO_GUARDADO = 1;
const PEDIDO_MODIFICADO = 2;
const ESTADO_EN_PROCESO = 3;
const ESTADO_A_FACTURAR = 4;
const ESTADO_ANULADO = 5;


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
          <strong>Se registró un nuevo pedido correctamente.</strong>
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

    <?php elseif ($mensaje == ESTADO_EN_PROCESO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>El estado del pedido cambió a "En proceso".</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == ESTADO_A_FACTURAR): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>El pedido está listo para facturar.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == ESTADO_ANULADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Pedido anulado correctamente.</strong>
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
                <div class="card-tools">
                  <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fas fa-file-pdf"></i>  PDF</a>
                  <a href="#" class="btn btn-success btn-sm" role="button"><i class="fas fa-file-excel"></i>  EXCEL</a>
                  <a href="#" class="btn btn-default btn-sm" role="button"><i class="fas fa-file-csv"></i> CSV</a>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover">
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

                        if ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::PENDIENTE) {

                          echo "<td><span class='badge bg-warning'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::EN_PROCESO) {

                          echo "<td><span class='badge bg-info'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::A_FACTURAR) {

                          echo "<td><span class='badge bg-primary'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::FACTURADO) {

                          echo "<td><span class='badge bg-success'>". $pedido->estadoPedido ."</span></td>";
                          
                        }

                        if ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::ANULADO) {

                          echo "<td><span class='badge bg-danger'>". $pedido->estadoPedido ."</span></td>";
                          
                        }



                        ?>
                     
                        <td> <?php echo $pedido->calcularTotal(); ?> </td>

                        <td>
                          
                        <?php if($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::PENDIENTE) : ?>
                        <a href="#" class="btn btn-warning btn-sm" onclick="cambiarEstado(<?php echo $pedido->getIdPedido(); ?>,<?php echo EstadoPedido::PENDIENTE ?>)">
                          <i class="fas fa-spinner"></i>
                        </a>

                        <?php elseif ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::EN_PROCESO): ?>
                        <a href="#" class="btn btn-info btn-sm" onclick="cambiarEstado(<?php echo $pedido->getIdPedido(); ?>, <?php echo EstadoPedido::EN_PROCESO ?>)">
                          <i class="fas fa-tasks"></i>
                        </a>

                        <?php elseif ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::A_FACTURAR): ?>
                        <a class='btn btn-primary btn-sm'  role='button' title='Facturar' href='../facturas/alta.php?id=<?php echo $pedido->getIdPedido(); ?>'>
                          <i class='fas fa-file-invoice-dollar'></i>
                        </a>

                        <?php elseif ($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::FACTURADO): ?>
                        <a class='btn btn-success btn-sm'  role='button' title='Facturado' href="#">
                          <i class="fas fa-check"></i>
                        </a>
                        <?php else: ?>
                        <a class='btn btn-danger btn-sm'  role='button' title='Cancelado' href="#">
                          <i class="fas fa-ban"></i>
                        </a>
                        <?php endif ?>

                        </td>
                      
                        <td> 

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $pedido->getIdPedido(); ?>" role="button" title="Ver">
                            <i class="fas fa-eye"></i>
                          </a>
                          <?php if($pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::EN_PROCESO || $pedido->estadoPedido->getIdPedidoEstado() == EstadoPedido::PENDIENTE):  ?>
                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $pedido->getIdPedido(); ?>" role="button" title="Ver">
                            <i class="fas fa-edit"></i>
                          </a>
                          <?php endif ?>
								           
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

<?php

require_once "cambiarEstado.php";

?>

</div>
	
<?php 
	include('../../footer.php');
?>

</body>

<script type="text/javascript">
  
  function cambiarEstado(id, idEstado){
    $('#estado').modal('show');
    $('#txtIdPedido').val(id)
    $('#cboEstado').val(idEstado)
  }



</script>


