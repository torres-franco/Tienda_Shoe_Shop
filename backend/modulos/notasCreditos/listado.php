<?php

require_once '../../class/NotaCredito.php';

const FACTURA_ANULADA = 1;


if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoPedidos = Pedido::obtenerTodo();


$listadoNotasCreditos = NotaCredito::obtenerTodos();

//highlight_string(var_export($listadoNotasCreditos, true));
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
            <h1 class="m-0 text-dark">Listado de Notas de Créditos</h1>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == FACTURA_ANULADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Factura anulada correctamente.</strong>
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
                	<a class="btn btn-outline-primary btn-sm" href="../facturas/listado.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Listado de facturas
                  </a>

                </h3>

              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>

                      <th>Fecha</th>
                      <th>Nro. Factura</th>
					            <th>N° Pedido</th>
                      <th>Motivo</th>          
                      <th>Observación</th> 
                      <th>Estado Pedido</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoNotasCreditos as $notaCredito): ?>

                  	<tbody>
                  
                      <tr>
                        <td> <?php echo $notaCredito->getFecha(); ?> </td>
                        <td> <?php echo $notaCredito->factura->getNumero(); ?> </td>
                        <td> <?php echo $notaCredito->factura->pedido->getIdPedido(); ?>
                        </td>
                        <td> <?php echo $notaCredito->motivo->getDescripcion(); ?> </td>
                        <td> <?php echo utf8_encode($notaCredito->getObservacion()); ?> </td>                        
                        
                        <?php

                        if ($notaCredito->factura->pedido->estadoPedido->getIdPedidoEstado() == 5){

                          echo "<td><span class='badge bg-danger'>". $notaCredito->factura->pedido->estadoPedido ."</span></td>";

                        }

                        ?>
                      
                      
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
