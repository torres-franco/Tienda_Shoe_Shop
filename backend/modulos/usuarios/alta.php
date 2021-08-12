<?php 

require_once '../../class/Perfil.php';

$listadoPerfil = Perfil::ObtenerTodos();


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
            <h1 class="m-0 text-dark">Carga de Usuarios</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <?php if (isset($_SESSION['mensaje_error'])) : ?>

    <div class="content">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fas text-black fa-exclamation-triangle"></i>
        <strong class="text-black"> <?php echo $_SESSION['mensaje_error'] ?></strong>
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
                <h3 class="card-title">Asegurese de completar todos los campos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php" enctype="multipart/form-data">
                <!--enctype="multipart/form-data" va en el form para enviar archivo-->

                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtNombre">Nombre:</label>
                      <input type="text" class="form-control" name="txtNombre" id="txtNombre">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" name="txtApellido" id="txtApellido">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="cboPerfil">Perfil:</label>
                          <select name="cboPerfil" class="form-control" id="cboPerfil">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoPerfil as $perfil): ?>

                              <option value="<?php echo $perfil->getIdPerfil(); ?>">
                              <?php echo $perfil; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtUser">Usuario:</label>
                        <input type="text" class="form-control" name="txtUser" id="txtUser">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="txtClave">Clave:</label>
                        <input type="password" class="form-control" name="txtClave" id="txtClave">
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="fileImagen">Foto</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="fileImagen" id="fileImagen">
                            </div>
                          </div>
                      </div>
                    </div>


                  </div>

                  


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button"> Cancelar</a>
                  
                  
                      <input class="btn btn-primary float-right" type="button" onclick="validarDatosUsuario();" value="Guardar">
                   
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