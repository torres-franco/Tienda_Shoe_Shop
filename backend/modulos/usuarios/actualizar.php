<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuarioDetalle = Usuario::obtenerPorId($id);

//highlight_string(var_export($usuarioDetalle, true));
//exit;

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
            <h1 class="m-0 text-dark">Actualizar Usuario</h1>
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
                <h3 class="card-title">Asegurese de completar todos los campos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="#">
                    <label for="txtId"></label>
                    <input type="hidden" class="form-control" name="txtId" value="<?php echo $usuarioDetalle->getIdUsuario(); ?>">
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtNombre">Nombre:</label>
                      <input type="text" class="form-control" name="txtNombre" value="<?php echo $usuarioDetalle->getNombre(); ?>" id="txtNombre">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" name="txtApellido" value="<?php echo $usuarioDetalle->getApellido(); ?>" id="txtApellido">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="cboPerfil">Perfil:</label>
                          <select name="cboPerfil" class="form-control" id="cboPerfil">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoPerfil as $perfil):
                                $selected = '';
                                
                                if ($usuarioDetalle->perfil->getIdPerfil() == $perfil->getIdPerfil()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $perfil->getIdPerfil(); ?>"
                                <?php echo $selected; ?>>
                                <?php echo $perfil; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtUser">Usuario:</label>
                        <input type="text" class="form-control" name="txtUser" value="<?php echo $usuarioDetalle->getUser(); ?>" id="txtUser">
                      </div>
                    </div>
                    <input type="hidden" class="form-control" name="txtClave" value="<?php echo $usuarioDetalle->getClave(); ?>" id="txtClave">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="fileImagen">Foto</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="fileImagen" id="fileImagen" value="<?php echo $usuarioDetalle->getImagen(); ?>">
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