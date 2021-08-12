<?php

require_once '../../class/Compra.php';

const COMPRA_GUARDADO = 1;
const COMPRA_MODIFICADO = 2;
const COMPRA_CONFIRMADA = 3;
const COMPRA_ANULADA = 4;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}


$listadoCompra = Compra::obtenerTodos();



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
            <h1 class="m-0 text-dark">Listado de Compras</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item">

                <!--<a class="btn btn-outline-primary btn-sm" href="../facturas/listado.php">
                  <i class="fas fa-file-invoice-dollar"></i>
                  Facturaciones
                </a>-->
              </li>   
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == COMPRA_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Se registró una compra a confirmar.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == COMPRA_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Compra actualizada correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == COMPRA_CONFIRMADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Se confirmó la compra correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == COMPRA_ANULADA): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Compra anulada correctamente.</strong>
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
                <h3 class="card-title pt-1">
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Nuevo Compra</a>
                </h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-danger btn-sm" role="button"><i class="fas fa-file-pdf"></i>  PDF</a>
                  <a href="#" class="btn btn-success btn-sm" role="button"><i class="fas fa-file-csv"></i>  EXCEL</a>
                  <a href="#" class="btn btn-default btn-sm" role="button"><i class="fas fa-file-csv"></i> CSV</a>
                </div>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover">
                  <thead>
                    <tr>

                      <th>Nro. Compra</th>
						          <th>Proveedor</th>
                      <th>CUIT</th>
                      <th>Fecha Compra</th>
                      <th>Estado Compra</th>
                      <th>Total</th>
                      <!--<th>Facturar</th>-->
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  	<?php foreach ($listadoCompra as $compra): ?>

                  	<tbody>
                  
                      <tr>
						            <th> <?php echo $compra->getIdCompra(); ?> </th>
						            <td> <?php echo $compra->proveedor->getRazonSocial(); ?> </td>
                        <td> <?php echo $compra->proveedor->getCuit(); ?> </td>
                        <td> <?php echo $compra->getFechaCompra(); ?> </td>

                      

                        <?php if ($compra->estadoCompra->getIdEstadoCompra() == 1): ?>
                        <td>
                          <a href="#" onclick="cambiarEstado(<?php echo $compra->getIdCompra(); ?>, <?php echo 1 ?>)">
                            <span class='badge bg-warning'> 
                              <?php echo $compra->estadoCompra ?> 
                            </span>
                          </a>
                        </td>
                          
                        <?php endif ?>

                        <?php if ($compra->estadoCompra->getIdEstadoCompra() == 2): ?>

                          <td>
                            <span class='badge bg-success'> <?php echo $compra->estadoCompra ?> 
                            </span>
                          </td>
                          
                        <?php endif ?>
                        

                        <?php if ($compra->estadoCompra->getIdEstadoCompra() == 3): ?>

                        <td>
                          <span class='badge bg-danger'> <?php echo $compra->estadoCompra ?> 
                          </span>
                        </td>
                          
                        <?php endif ?>


          
                     
                        <td> <?php echo $compra->calcularTotal(); ?> </td>
                      
                        <td> 

                          <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $compra->getIdCompra(); ?>" role="button" title="Ver">
                            <i class="fas fa-eye"></i>
                          </a>

                          <?php if ($compra->getIdEstadoCompra() == 1): ?>

                          <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $compra->getIdCompra(); ?>" role="button" title="Ver">
                            <i class="fas fa-edit"></i>
                          </a>

                          

                          
								           
							          </td>
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

<?php

require_once "actualizarEstado.php";

?>

</div>
	
<?php 
	include('../../footer.php');
?>

</body>

<script type="text/javascript">
  
  function cambiarEstado(id, idEstado){
    $('#estado').modal('show');
    $('#txtIdCompra').val(id)
    $('#cboEstado').val(idEstado)
  }

  function anularCompra(idCompra, idEstadoAnular){
    $('#anular').modal('show');
    $('#txtIdCompra').val(idCompra)
    $('#cboEstado').val(idEstadoAnular)
  }



</script>

