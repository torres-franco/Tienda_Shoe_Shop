<?php

require_once '../../class/Compra.php';

/*const PEDIDO_GUARDADO = 1;
const PEDIDO_MODIFICADO = 2;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}*/

$listadoCompra = Compra::obtenerTodos();



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
            <h1 class="m-0 text-dark">Listado de Compra</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">

                <!--<a class="btn btn-outline-primary btn-sm" href="../facturas/listado.php">
                  <i class="fas fa-file-invoice-dollar"></i>
                  Facturaciones
                </a>-->
              </li>   
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Nuevo Compra</a>
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>

                      <th>Nro. Compra</th>
						          <th>Proveedor</th>
                      <th>CUIT</th>
                      <th>Fecha Compra</th>
                      <th>Estado Compra</th>
                      <th>Total</th>
                      <!--<th>Facturar</th>-->
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoCompra as $compra): ?>

                  	<tbody>
                  
                      <tr>
						            <th> <?php echo $compra->getIdCompra(); ?> </th>
						            <td> <?php echo $compra->proveedor->getRazonSocial(); ?> </td>
                        <td> <?php echo $compra->proveedor->getCuit(); ?> </td>
                        <td> <?php echo $compra->getFechaCompra(); ?> </td>

                        <?php  

                        if ($compra->estadoCompra->getIdEstadoCompra() == 1) {

                          echo "<td><span class='badge bg-success'>". $compra->estadoCompra ."</span></td>";
                          
                        }

                        if ($compra->estadoCompra->getIdEstadoCompra() == 2) {

                          echo "<td><span class='badge bg-danger'>". $compra->estadoCompra ."</span></td>";
                          
                        }

                        if ($compra->estadoCompra->getIdEstadoCompra() == 3) {

                          echo "<td><span class='badge bg-success'>". $compra->estadoCompra ."</span></td>";
                          
                        }


                        ?>
                     
                        <td> <?php echo $compra->calcularTotal(); ?> </td>
                      
                        <td> 

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $compra->getIdCompra(); ?>" role="button" title="Ver">
                            <i class="fas fa-eye"></i>
                          </a>
                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $compra->getIdCompra(); ?>" role="button" title="Ver">
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
