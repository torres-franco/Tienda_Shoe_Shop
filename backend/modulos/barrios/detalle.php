<?php

require_once '../../class/Barrio.php';

$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);

//highlight_string(var_export($barrio, true));
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
            <h1 class="m-0 text-dark">Detalle del Barrio</h1>
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
                      <th>Barrio</th>
                      <th>Ciudad</th>

                    </tr>
                  </thead>              

                    <tbody>
                  
                      <tr>
                        <td> <?php echo $barrio->getIdBarrio(); ?> </td>
                        <td> <?php echo utf8_encode($barrio->getDescripcion()); ?> </td>
                        <td> <?php echo $barrio->ciudad->getNombre(); ?> </td>
                        
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