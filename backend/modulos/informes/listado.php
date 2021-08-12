<?php

require_once '../../class/Producto.php';

$listadoProducto = Producto::obtenerTodo();

$listadoMarca = Marca::obtenerTodos();

//highlight_string(var_export($listadoFactura, true));
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
            <h1 class="m-0 text-dark">Informe de Stock</h1>
          </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right pt-1">
                  <li class="breadcrumb-item">

                        <a class="btn btn-primary btn-sm" href="listado.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Stock
                        </a>
                        <a class="btn btn-primary btn-sm" href="venta.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Ventas
                        </a>
                        <!--<a class="btn btn-primary btn-sm" href="compra.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Compras
                        </a>-->
                        <a class="btn btn-primary btn-sm" href="productoMasVendido.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Productos más vendidos
                        </a>

                  </li>   
              </ol>
            </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-warning btn-sm" href="stockMinimo.php">
                    <i class="fas fa-exclamation-triangle"></i>
                    Productos a agotarse
                  </a>

                </h3>
                <!--<div class="row col-sm-6">-->
                <div class="card-tools">
                  <!--<select name="cboMarca" class="form-control" id="cboMarca">
                    <option>Filtrar por Marca</option>

                    <?php /*foreach ($listadoMarca as $marca):*/ ?>

                      <option value="<?php /*echo $marca->getIdMarca();*/ ?>">
                        <?php /*echo $marca;*/ ?>
                      </option>

                    <?php /*endforeach*/ ?>

                  </select>
                  
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-primary my-2 my-sm-0" type="submit" title="Filtrar"><i class="fas fa-filter"></i></button>
                </div>-->

                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>

                      <!--<th>ID</th>-->
                      <th>Descripción</th> 
                      <th>Stock Actual</th>
                      <th>Stock Mínimo</th>

                    </tr>
                  </thead>

                    <?php foreach ($listadoProducto as $producto): ?>

                    <tbody>
                  
                      <tr>

                      
                        <td> 
                          <?php echo $producto->marca->getDescripcion(); ?> 
                          <?php echo $producto->getDescripcion(); ?> 
                        </td>
                        <?php if ($producto->getStockActual() <= $producto->getStockMinimo()): ?>

                          <td>
                            <span class='badge bg-danger'><?php echo $producto->getStockActual(); ?>                            
                            </span>
                          </td>
                          <td>
                            <span class='badge bg-danger'>
                              <?php echo $producto->getStockMinimo(); ?>
                            </span>
                          </td>

                        <?php else: ?>  

                        <td> <?php echo $producto->getStockActual(); ?> </td>

                        <td> <?php echo $producto->getStockMinimo(); ?> </td>

                      <?php endif ?>   
                       
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
