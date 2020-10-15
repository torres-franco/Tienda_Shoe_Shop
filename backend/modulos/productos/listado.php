<?php

require_once '../../class/Producto.php';

const PRODUCTO_GUARDADO = 1;
const PRODUCTO_MODIFICADO = 2;
const PRODUCTO_ELIMINADO = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}

$listadoProducto = Producto::obtenerTodo();

//highlight_string(var_export($listadoProducto,true));

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
          <h1 class="m-0 text-dark">Registro de productos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <?php if ($mensaje == PRODUCTO_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Producto guardado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == PRODUCTO_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Producto actualizado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == PRODUCTO_ELIMINADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Producto eliminado correctamente.</strong>
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
                  <a href="alta.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-shopping-basket"></i> Agregar</a>
                </h3>

                <div class="card-tools">
                  <!--<div class="input-group input-group-sm pt-1" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar...">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>-->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>

                      <th>Marca</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                    <?php foreach ($listadoProducto as $producto): ?>

                  <tbody>
                  
                      <tr>
                        <td> <?php echo $producto->marca->getDescripcion(); ?> </td>
                        <td> <?php echo $producto->getDescripcion(); ?> </td>
                        <td>$ <?php echo $producto->getPrecio(); ?> </td>
                        <td> 
                            <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $producto->getIdProducto(); ?>" role="button" title="Ver"><i class="fas fa-eye"></i>
                            </a>

                            <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $producto->getIdProducto(); ?>" role="button" title="Editar">
                              <i class="fas fa-pen"></i>
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