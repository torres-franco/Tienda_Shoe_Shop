<?php

require_once '../../class/Marca.php';
require_once '../../class/MySQL.php';

$listadoMarca = Marca::obtenerTodos();
//highlight_string(var_export($listadoMarca, true));
//exit;

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT * , SUM(dc.cantidad * dc.precio) as total FROM compra
        INNER JOIN detallecompra as dc ON dc.id_compra = compra.id_compra
        WHERE compra.fecha BETWEEN '$fechaDesde' AND '$fechaHasta'
        GROUP BY compra.id_compra";

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
            <h1 class="m-0 text-dark">Informes de compras por fechas</h1>
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
                        <a class="btn btn-primary btn-sm" href="compra.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Compras
                        </a>
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

                
              </div>

              
              <div class="card-body p-0">
                 <?php if (!is_null($datos)): ?>
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>
                        <th>Nro. Compra</th>
                        <th>Fecha de Compra</th>
                       
                        <th>Total</th>
                    </tr>
                  </thead>
                    <?php while($row = $datos->fetch_assoc()): ?>

                    <tbody>
                      <tr>
                        <td><?php echo $row['id_compra'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>                   
                        
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
