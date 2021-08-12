<?php

require_once '../../class/Ciudad.php';

const CIUDAD_GUARDADA = 1;
const CIUDAD_MODIFICADA = 2;
const CIUDAD_ELIMINADA = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoCiudad = Ciudad::obtenerTodos();



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
            <h1 class="m-0 text-dark">Listado de Ciudades</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == CIUDAD_GUARDADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ciudad guardada correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == CIUDAD_MODIFICADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ciudad actualizada correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == CIUDAD_ELIMINADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Ciudad eliminada correctamente.</strong>
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
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Agregar</a>
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>

                      <th>ID</th>
						          <th>Ciudad</th>
                      <th>Código Postal</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoCiudad as $ciudad): ?>

                  	<tbody>
                  
                      <tr>
						            <td> <?php echo $ciudad->getIdCiudad(); ?> </td>
						            <td> <?php echo $ciudad->getNombre(); ?> </td>
                        <td> <?php echo $ciudad->getCodigoPostal(); ?> </td>
                        <td>

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $ciudad->getIdCiudad(); ?>" role="button" title="Ver">
                              <i class="fas fa-eye"></i>
                          </a>

                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $ciudad->getIdCiudad(); ?>" role="button" title="Editar">
                              <i class="fas fa-pen"></i>
                          </a>
                          
                          <a class="btn btn-danger btn-sm" href="procesar/eliminar.php?id=<?php echo $ciudad->getIdCiudad(); ?>" role="button" title="Eliminar">
                              <i class="fas fa-trash-alt"></i>
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
</html>