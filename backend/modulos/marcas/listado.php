<?php

require_once '../../class/Marca.php';

const MARCA_GUARDADO = 1;
const MARCA_MODIFICADO = 2;
const MARCA_ELIMINADO = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoMarca = Marca::obtenerTodos();



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
            <h1 class="m-0 text-dark">Listado de Marcas</h1>
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

       <?php if ($mensaje == MARCA_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Marca guardada correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == MARCA_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Marca actualizada correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == MARCA_ELIMINADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Marca eliminada correctamente.</strong>
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
						          <th>Marcas</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoMarca as $marca): ?>

                  	<tbody>
                  
                      <tr>
						            <td> <?php echo $marca->getIdMarca(); ?> </td>
						            <td> <?php echo $marca->getDescripcion(); ?> </td>
                        
                        <td>

                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $marca->getIdMarca(); ?>" role="button" title="Editar">
                              <i class="fas fa-pen"></i>
                          </a>
                          
                          <a class="btn btn-danger btn-sm" href="procesar/eliminar.php?id=<?php echo $marca->getIdMarca(); ?>" role="button" title="Eliminar">
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