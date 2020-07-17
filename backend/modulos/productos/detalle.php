<?php

require_once '../../class/Producto.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);

//highlight_string(var_export($producto, true));
//exit;

?>

<!doctype html>
<html lang="es">


<?php
  include('../../header.php');
?>

<body>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalle del producto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
	
	    
    <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              

            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
  		          <thead>
                  <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Descripción</th>
                    <th>Stock Actual</th>
                    <th>Stock Mínimo</th>
                    <th>Categoría</th>
                    <th>Color</th>
                    <th>Talle</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    
                    <td> <?php echo $producto->getIdProducto(); ?> </td>
                    <td> <?php echo $producto->marca->getDescripcion(); ?> </td>
                    <td> <?php echo $producto->getDescripcion(); ?> </td>
                    <td> <?php echo $producto->getStockActual(); ?> </td>
                    <td> <?php echo $producto->getStockMinimo(); ?> </td>
                    <td> <?php echo $producto->categoria->getDescripcion(); ?> </td>
                    <td> <?php echo $producto->color->getDescripcion(); ?> </td>
                    <td> <?php echo $producto->talle->getDescripcion(); ?> </td>
                    
                  </tr>
                </tbody>
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