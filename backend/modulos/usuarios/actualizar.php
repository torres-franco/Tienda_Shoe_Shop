<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Actualizar Usuario</h1>
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
                    <input type="hidden" class="form-control" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtNombre">Nombre:</label>
                      <input type="text" class="form-control" name="txtNombre" value="<?php echo $usuario->getNombre(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" name="txtApellido" value="<?php echo $usuario->getApellido(); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-group">
                          <label for="txtDni">DNI:</label>
                          <input type="number" class="form-control" name="txtDni" value="<?php echo $usuario->getDni(); ?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtUser">Usuario:</label>
                        <input type="text" class="form-control" name="txtUser" value="<?php echo $usuario->getUser(); ?>">
                      </div>
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listadoUsuario.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
                      <button type="submit" class="btn btn-primary float-right">Guardar <i class="fas fa-save"></i></button>
                   
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