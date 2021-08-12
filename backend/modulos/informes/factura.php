<?php

require_once '../../class/Factura.php';

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha_emision, factura.numero, factura.tipo, "
        . "SUM(dp.cantidad * dp.precio) as total FROM factura "
        . "INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido "
        . "INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido "
        . "WHERE factura.fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta' "
        . " GROUP BY factura.id_factura ";

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
            <h1 class="m-0 text-dark">Informes de facturas por fechas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a class="btn btn-outline-primary btn-sm" href="../facturas/listado.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    Lista de Facturas
                  </a>
                </h3>

                <div class="card-tools">
                  <form method='GET'>
                  <div class="row  col-14">
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
                  </form>
                </div>

                
              </div>

              
              <div class="card-body p-0">
                 <?php if (!is_null($datos)): ?>
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>
                        <th>Nro. Factura</th>
                        <th>Fecha Emisión</th>
                        <th>Tipo de Factura</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                    <?php while($row = $datos->fetch_assoc()): ?>

                    <tbody>
                      <tr>
                        <td><?php echo $row['numero'] ?></td>
                        <td><?php echo $row['fecha_emision'] ?></td>                   
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['total'] ?></td>                   
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
