<?php

require_once '../../class/Modulo.php';

$id = $_GET['id'];

$modulos = Modulo::obtenerPorId($id);

//highlight_string(var_export($modulos,true));
//exit;


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
            <h1 class="m-0 text-dark">Actualizar Módulo</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Asegurese de completar todos los campos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" method="POST" action="procesar/modificar.php">
                <div class="card-body">

                  
                    <div class="#">
                      <label for="txtId"></label>
                      <input type="hidden" class="form-control" name="txtId" value="<?php echo $modulos->getIdModulo(); ?>">
                    </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtDescripcion">Módulo:</label>
                      <input type="text" class="form-control" name="txtDescripcion" value="<?php echo $modulos->getDescripcion(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtDirectorio">Directorio:</label>
                        <input type="text" class="form-control" name="txtDirectorio" value="<?php echo $modulos->getDirectorio(); ?>" >
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button">Cancelar</a>
                  
                      <input class="btn btn-primary float-right" type="submit" value="Guardar">
                   
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