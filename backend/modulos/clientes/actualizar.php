<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Actualizar Cliente</h1>
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
                    <input type="hidden" class="form-control" name="txtId" value="<?php echo $cliente->getIdCliente(); ?>">
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtNombre">Nombre:</label>
                      <input type="text" class="form-control" name="txtNombre" value="<?php echo $cliente->getNombre(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" name="txtApellido" value="<?php echo $cliente->getApellido(); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtDni">Número de DNI:</label>
                        <input type="number" class="form-control" name="txtDni" value="<?php echo $cliente->getDni(); ?>">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtFechaNacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="txtFechaNacimiento" value="<?php echo $cliente->getFechaNacimiento(); ?>">
                      </div>
                    </div>
                  </div>

                  <!--<div class="form-group">
                    <label>Género:</label>
                    <input type="txt" class="form-control" name="txtGenero" value="<?php echo $cliente->getGenero(); ?>">
                  </div>-->

                  <div class="form-group">
                    <label>Género</label>
                    <select class="form-control" name="txtGenero">
                      <option><?php echo $cliente->getGenero(); ?></option>
                      <option for="txtGenero">Masculino</option>
                      <option for="txtGenero">Femenino</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listadoCliente.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
                      <button type="submit" class="btn btn-primary float-right">Actualizar <i class="fas fa-sync"></i></button>
                   
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