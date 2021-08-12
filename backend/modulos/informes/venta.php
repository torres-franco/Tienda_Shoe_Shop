<?php

require_once '../../class/MySQL.php';
require_once '../../class/Factura.php';

$listadoFactura = Factura::obtenerTodos();

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

if (isset($_GET['cboTipo'])) {
    $tipo = $_GET['cboTipo'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta) && isset($tipo)) {
    if (!empty($fechaDesde) && !empty($fechaHasta) && !empty($tipo)) {
      if($tipo == "Sin seleccionar") {
         $sql = "SELECT factura.fecha_emision, factura.numero, factura.tipo, dp.cantidad, SUM(dp.cantidad * dp.precio) as total FROM factura INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido INNER JOIN producto as pro ON dp.id_producto = pro.id_producto WHERE factura.fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta' GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
      } else {
        $sql = "SELECT factura.fecha_emision, factura.numero, factura.tipo, dp.cantidad, SUM(dp.cantidad * dp.precio) as total FROM factura INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido INNER JOIN producto as pro ON dp.id_producto = pro.id_producto WHERE factura.fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta' AND factura.tipo = '$tipo' GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);

      }
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
            <h1 class="m-0 text-dark">Informes de Facturaciones</h1>
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
                            Informe de Facturación
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
                  <div class="col-sm-12">
                    <div class="form-group">
                       
                      <select name="cboTipo" class="form-control" id="cboTipo">
                          <option value="Sin seleccionar">Seleccionar Tipo</option>

                          
                          <option value="A">A
                          </option>
                          <option value="B">B
                          </option>
                          <option value="C">C
                          </option>

                      </select>
                    </div>
                  </div>
                </h3>

                <div class="card-tools">
                  <div class="row col-6">
                      <strong class="pt-1">Desde:</strong>
                      <div class="col-sm-4">
                        
                        <input type="date" class="form-control" name="txtFechaDesde">
                      
                      </div>
                      <strong class="pt-1">Hasta:</strong>
                      <div class="col-sm-4">
                        
                        <input type="date" class="form-control" name="txtFechaHasta">
                      
                      </div>

                      <div class="col-sm-1">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit" title="Filtrar"><i class="fas fa-filter"></i></button>
                      </div>
                    
                  </div>
                  
                </div>
                </form>

                <!--<div class="col-lg-12">
                  <canvas id="venta" width="400" height="150"></canvas>
                </div>-->
              </div>
     
              <div class="card-body p-0">
                 <?php if (!is_null($datos)): ?>
                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                        <th>Fecha Facturación</th>
                        <th>Nro. Factura</th>
                        <th>Tipo</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                    <?php while($row = $datos->fetch_assoc()): ?>

                    <tbody>
                      <tr>
                        <td><?php echo $row['fecha_emision']; ?></td>           
                        <td><?php echo $row['numero']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['total']; ?></td>                   
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
