<?php

require_once '../../class/MySQL.php';
require_once '../../class/Marca.php';

$listadoMarca = Marca::obtenerTodos();

if (isset($_GET['cboMes'])) {
    $mes = $_GET['cboMes'];
}

/*if (isset($_GET['cboMarca'])) {
    $marca = $_GET['cboMarca'];
}*/

$datos = NULL;

if (isset($mes)) {
    if (!empty($mes)) {
        $sql = "SELECT pro.descripcion as Producto, c.descripcion as Categoria, m.descripcion as Marca, SUM(dp.cantidad) AS cantidad FROM factura INNER JOIN pedidodetalle AS dp ON dp.id_pedido = factura.id_pedido INNER JOIN producto AS pro ON pro.id_producto = dp.id_producto INNER JOIN categoria as c ON pro.id_categoria = c.id_categoria INNER JOIN marca as m ON pro.id_marca = m.id_marca WHERE MONTH(factura.fecha_emision) = '$mes' GROUP BY pro.descripcion ORDER BY cantidad DESC LIMIT 5";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);


    }
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
            <h1 class="m-0 text-dark">Informes de productos más vendidos</h1>
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
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form method='GET'>
                <h3 class="card-title">
                  
                </h3>

                <div class="card-tools">
                  <div class="row col-6">
                      <strong class="pt-1">Mes:</strong>
                      <div class="col-sm-6">
                      <select name="cboMes" class="custom-select form-control">
                      <option value="0">Seleccionar mes</option>     
                      <option value="1">Enero</option>
                      <option value="2">Febrero</option>
                      <option value="3">Marzo</option>
                      <option value="4">Abril</option>
                      <option value="5">Mayo</option>
                      <option value="6">Junio</option>
                      <option value="7">Julio</option>
                      <option value="8">Agosto</option>
                      <option value="9">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                      </select>
                      </div>

                      <div class="col-sm-1">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit" title="Filtrar"><i class="fas fa-filter"></i></button>
                      </div>
                    
                  </div>
                  
                </div>
                </form>

                
              </div>

              
              <div class="card-body p-0">
                 <?php if (!is_null($datos)): ?>
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>
                        <th>Top productos</th>
                        <th>Cantidad</th>
                        <!--<th>Total</th>-->
                    </tr>
                  </thead>
                    <?php while($row = $datos->fetch_assoc()): ?>

                    <tbody>
                      <tr>
                        <td>
                          <?php echo $row['Categoria'] ?>
                          <?php echo $row['Marca'] ?>
                          <?php echo $row['Producto'] ?>  
                        </td>
                        <td><?php echo $row['cantidad'] ?></td>
                        <!--<td><?php /*echo $row['total']*/?></td>-->                 
                      </tr>
                    </tbody>

                    <?php endwhile ?>
                </table>
              <?php endif ?>
              </div>
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