<?php

require_once '../../class/Direccion.php';

$listadoDirecciones = Direccion::obtenerTodo();



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
            <h1 class="m-0 text-dark">NO ES UN MÓDULO, sólo es para verificar la funcionalidad de los Insert, Update y Delete de Dirección</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button"> Agregar</a>
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>

                      <th>Calle</th>
						          <th>Altura</th>
                      <th>Manzana</th>
                      <th>Torre</th>
                      <th>Piso</th>
                      <th>N° de puerta</th>
                      <th>Sector</th>
                      <th>Referencia</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoDirecciones as $direccion): ?>

                  	<tbody>
                  
                      <tr>
						            <td> <?php echo $direccion->getCalle(); ?> </td>
						            <td> <?php echo $direccion->getAltura(); ?> </td>
                        <td> <?php echo $direccion->getManzana(); ?> </td>
                        <td> <?php echo $direccion->getTorre(); ?> </td>
                        <td> <?php echo $direccion->getPiso(); ?> </td>
                        <td> <?php echo $direccion->getNumeroPuerta(); ?> </td>
                        <td> <?php echo $direccion->getSector(); ?> </td>
                        <td> <?php echo $direccion->getReferencia(); ?> </td>
						            <td> 
								           
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
</html>