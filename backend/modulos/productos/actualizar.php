<?php

require_once '../../class/Producto.php';

require_once '../../class/Categoria.php';
require_once '../../class/Marca.php';
require_once '../../class/Talle.php';
require_once '../../class/Color.php';

$id = $_GET['id'];

$producto = Producto::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Actualizar de Proveedor</h1>
          </div><!-- /.col -->
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
              <form name="frmDatos" method="POST" action="procesar/modificar.php">
                <div class="card-body">

                  <div class="#">
                    <label for="txtId"></label>
                    <input type="hidden" class="form-control" name="txtId" value="<?php echo $producto->getIdProducto(); ?>">
                  </div>

                 

                  <div class="row">

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtProvincia">Marca:</label>
                          <select name="cboMarca" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoMarca as $marca):
                                $selected = '';
                                
                                if ($producto->marca->getIdMarca() == $marca->getIdMarca()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $marca->getIdMarca(); ?>"
                                <?php echo $selected; ?>>
                                <?php echo $marca; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>
                  
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtDescripcion">Descripción:</label>
                        <input type="text" class="form-control" name="txtDescripcion" value="<?php echo $producto->getDescripcion(); ?>">
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtPrecio">Precio:</label>
                        <input type="text" class="form-control" name="txtPrecio" value="<?php echo $producto->getPrecio(); ?>">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtStockActual">Stock Actual:</label>
                        <input type="number" class="form-control" name="txtStockActual" value="<?php echo $producto->getStockActual(); ?>">
                      </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtStockMinimo">Stock Mínimo:</label>
                        <input type="number" class="form-control" name="txtStockMinimo" value="<?php echo $producto->getStockMinimo(); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="optCategoria">Categorías:</label>
                          <select name="cboCategoria" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoCategoria as $categoria):
                                $selected = '';
                                
                                if ($producto->categoria->getIdCategoria() == $categoria->getIdCategoria()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $categoria->getIdCategoria(); ?>"
                                <?php echo $selected; ?>>
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

                              <?php foreach ($listadoColor as $color):
                                $selected = '';
                                
                                if ($producto->color->getIdColor() == $color->getIdColor()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $color->getIdColor(); ?>"
                                <?php echo $selected; ?>>
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

                              <?php foreach ($listadoTalle as $talle):
                                $selected = '';
                                
                                if ($producto->talle->getIdTalle() == $talle->getIdTalle()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $talle->getIdTalle(); ?>"
                                <?php echo $selected; ?>>
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