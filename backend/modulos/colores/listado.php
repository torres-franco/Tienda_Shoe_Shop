<?php

require_once '../../class/Color.php';

$listadoColor = Color::obtenerTodos();


require_once '../../class/Cliente.php';

const COLOR_GUARDADO = 1;
const COLOR_MODIFICADO = 2;
const COLOR_ELIMINADO = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}



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
            <h1 class="m-0 text-dark">Listado de Colores</h1>
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

    <?php if ($mensaje == COLOR_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Color guardado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == COLOR_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Color actualizado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == COLOR_ELIMINADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Color eliminado correctamente.</strong>
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
						          <th>Colores</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoColor as $color): ?>

                  	<tbody>
                  
                      <tr>
						            <td> <?php echo $color->getIdColor(); ?> </td>
						            <td> <?php echo utf8_encode($color->getDescripcion()); ?> </td>
                        
                        <td>

                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $color->getIdColor(); ?>" role="button" title="Editar">
                              <i class="fas fa-pen"></i>
                          </a>
                          
                          <a class="btn btn-danger btn-sm" href="procesar/eliminar.php?id=<?php echo $color->getIdColor(); ?>" role="button" title="Eliminar">
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
</Colores