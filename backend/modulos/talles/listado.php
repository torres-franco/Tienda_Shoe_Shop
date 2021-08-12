<?php

require_once '../../class/Talle.php';

const TALLE_GUARDADO = 1;
const TALLE_MODIFICADO = 2;
const TALLE_ELIMINADO = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoTalle = Talle::obtenerTodos();



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
            <h1 class="m-0 text-dark">Listado de Talles</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <
                    Volver a productos
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="../productos/alta.php">Alta</a>
                      <a class="dropdown-item" href="../productos/listado.php">Listado</a>
                    </div>
                </div>
              </li>   
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == TALLE_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Talle guardado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == TALLE_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Talle actualizado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == TALLE_ELIMINADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Talle eliminado correctamente.</strong>
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
						          <th>Talles</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoTalle as $talle): ?>

                  	<tbody>
                  
                      <tr>
						            <td> <?php echo $talle->getIdTalle(); ?> </td>
						            <td> <?php echo $talle->getDescripcion(); ?> </td>
                        
                        <td>

                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $talle->getIdTalle(); ?>" role="button" title="Editar">
                              <i class="fas fa-pen"></i>
                          </a>
                          
                          <a class="btn btn-danger btn-sm" href="procesar/eliminar.php?id=<?php echo $talle->getIdTalle(); ?>" role="button" title="Eliminar">
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