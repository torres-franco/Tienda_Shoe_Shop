<?php

require_once '../../class/Ciudad.php';

$id = $_GET['id'];

$ciudad = Ciudad::obtenerPorId($id);

//highlight_string(var_export($ciudad, true));
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
            <h1 class="m-0 text-dark">Detalle de la ciudad</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-1">
              <li class="breadcrumb-item"><a href="listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">
                  <a href="alta.php" class="btn btn-primary btn-sm" role="button">+ Agregar</a>
                </h3>

                
              </div>-->
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>

                      <th>ID</th>
                      <th>Ciudad</th>
                      <th>Código Postal</th>
                      <th>Provincia</th>

                    </tr>
                  </thead>

               

                    <tbody>
                  
                      <tr>
                        <td> <?php echo $ciudad->getIdCiudad(); ?> </td>
                        <td> <?php echo $ciudad->getNombre(); ?> </td>
                        <td> <?php echo $ciudad->getCodigoPostal(); ?> </td>
                        <td> <?php echo $ciudad->provincia->getNombre(); ?> </td>
                        
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