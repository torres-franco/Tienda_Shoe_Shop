<?php

require_once '../../class/TipoContacto.php';

$listadoContacto = TipoContacto::obtenerTodo();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];

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
            <h1 class="m-0 text-dark">Carga de contacto</h1>
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
                <h3 class="card-title">Asegurese de ingresar los datos de contactos correctamente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">

                  
                      <label for="txtIdPersona"></label>
                      <input type="hidden" name="txtIdPersona" value="<?php echo $idPersona ?>">
                  
                  
                      <label for="txtIdLlamada"></label>
                      <input type="hidden" name="txtIdLlamada" value="<?php echo $idLlamada ?>">
                  
                  
                      <label for="txtModulo"></label>
                      <input type="hidden" name="txtModulo" value="<?php echo $moduloLlamada ?>">
                  

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cboTipoContacto">Tipo de Contacto:</label>
                          <select name="cboTipoContacto" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoContacto as $contacto): ?>

                              <option value="<?php echo $contacto->getIdTipoContacto(); ?>">
                              <?php echo utf8_encode($contacto); ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="txtValor">Descripción de contacto:</label>
                        <input type="text" class="form-control" name="txtValor">
                      </div>
                    </div>

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../clientes/listado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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