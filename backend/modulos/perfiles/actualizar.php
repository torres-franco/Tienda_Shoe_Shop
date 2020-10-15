<?php

require_once '../../class/Modulo.php';
require_once '../../class/Perfil.php';

$idPerfil = $_GET['id'];

$perfil = Perfil::obtenerPorId($idPerfil);

$listadoModulos = Modulo::obtenerTodos();

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
            <h1 class="m-0 text-dark">Actualizar Perfil</h1>
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

                  
                  <div class="row">

                    <div class="#">
                    <label for="txtIdPerfil"></label>
                    <input type="hidden" class="form-control" name="txtIdPerfil" value="<?php echo $idPerfil; ?>">
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtDescripcion">Perfil:</label>
                      <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" value="<?php echo $perfil->getDescripcion() ?>">
                    </div>
                    </div>
                    
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Asignar módulos</label>
                      <select name="cboModulos[]" multiple class="form-control" id="#">

                        <?php foreach ($listadoModulos as $modulo): ?>

                          <?php 

                          $selected = '';
                          $idModulo = $modulo->getIdModulo();

                          if ($perfil->tieneModulo($idModulo)) {
                            $selected = "SELECTED";
                          }

                          ?>

                          <option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >

                          <?php echo $modulo; ?>

                          </option>

                        <?php endforeach  ?>

                      </select>
                    </div>
                    </div>
                    
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../perfiles/listado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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