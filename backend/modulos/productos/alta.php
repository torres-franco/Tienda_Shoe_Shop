<?php

require_once '../../class/Categoria.php';
require_once '../../class/Marca.php';
require_once '../../class/Talle.php';
require_once '../../class/Color.php';

$listadoCategoria = Categoria::obtenerTodos();
$listadoMarca = Marca::obtenerTodos();
$listadoTalle = Talle::obtenerTodos();
$listadoColor = Color::obtenerTodos();

?>
<!doctype html>
<html lang="es">

<body>

<?php
  include('../../header.php');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Carga de Productos</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marcas
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Agregar</a>
                      <a class="dropdown-item" href="#">Ver listado</a>
                    </div>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Agregar</a>
                      <a class="dropdown-item" href="#">Ver listado</a>
                    </div>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Colores
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Agregar</a>
                      <a class="dropdown-item" href="#">Ver listado</a>
                    </div>
                  </div>

                <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Talles
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Agregar</a>
                    <a class="dropdown-item" href="#">Ver listado</a>
                  </div>
                </div>
                  
                </div>
              </li>   
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Asegurese de completar todos los campos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtMarca">Marca:</label>
                          <select name="cboMarca" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoMarca as $marca): ?>

                              <option value="<?php echo $marca->getIdMarca(); ?>">
                              <?php echo $marca; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>
                  
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtDescripcion">Descripción:</label>
                        <input type="text" class="form-control" name="txtDescripcion">
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtPrecio">Precio:</label>
                        <input type="text" class="form-control" name="txtPrecio">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtStockActual">Stock Actual:</label>
                        <input type="number" class="form-control" name="txtStockActual">
                      </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtStockMinimo">Stock Mínimo:</label>
                        <input type="number" class="form-control" name="txtStockMinimo">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="optCategoria">Categorías:</label>
                          <select name="cboCategoria" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoCategoria as $categoria): ?>

                              <option value="<?php echo $categoria->getIdCategoria(); ?>">
                              <?php echo $categoria; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>
                                     
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtColor">Color:</label>
                          <select name="cboColor" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoColor as $color): ?>

                              <option value="<?php echo $color->getIdColor(); ?>">
                              <?php echo utf8_encode($color); ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>


                    <div class="col-md-4 mb-3">
                      <div class="form-group">

                        <label for="txtTalle">Talle:</label>
                          <select name="cboTalle" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoTalle as $talle): ?>

                              <option value="<?php echo $talle->getIdTalle(); ?>">
                              <?php echo $talle; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
                      <button type="submit" class="btn btn-primary float-right">Guardar <i class="fas fa-save"></i></button>
                   
                </div>
              </form>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
  include('../../footer.php');
?>
</body>
</html>