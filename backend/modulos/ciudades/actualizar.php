<?php

require_once '../../class/Ciudad.php';

$id = $_GET['id'];

$ciudad = Ciudad::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Carga de ciudad</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <?php if (isset($_SESSION['mensaje_error'])) : ?>

    <div class="content">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas text-white fa-exclamation-triangle"></i>
        <strong class="text-white"> <?php echo $_SESSION['mensaje_error'] ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>

            <?php
                unset($_SESSION['mensaje_error']);
                endif;
            ?>

    <h5 class="text-center">
      <div id="mensajeError" class="text-danger"></div>
    </h5>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Asegurese de ingresar la ciudad correctamente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
                <div class="card-body">
                    <div class="#">
                      <label for="txtId"></label>
                      <input type="hidden" class="form-control" name="txtId" value="<?php echo $ciudad->getIdCiudad(); ?>">
                    </div>

                  <div class="row">

                     <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtCodigoPostal">Código Postal:</label>
                        <input type="text" class="form-control" name="txtCodigoPostal" value="<?php echo $ciudad->getCodigoPostal(); ?>" id="txtCodigoPostal">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtNombre">Ciudad:</label>
                        <input type="text" class="form-control" name="txtNombre" value="<?php echo $ciudad->getNombre(); ?>" id="txtNombre">
                      </div>
                    </div>

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../ciudades/listado.php" class="btn btn-secondary" role="button">Cancelar</a>
                  
                  
                      <input class="btn btn-primary float-right" type="button" onclick="validarDatosCiudad();" value="Guardar">
                   
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