<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Detalle del proveedor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="listadoProveedor.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
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
                    <th>Razon Social</th>
                    <th>CUIT</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td> <?php echo $proveedor->getIdProveedor(); ?> </td>
                    <td> <?php echo $proveedor->getRazonSocial(); ?> </td>
                    <td> <?php echo $proveedor->getCuit(); ?> </td>
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