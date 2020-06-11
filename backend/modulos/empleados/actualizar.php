<?php

require_once '../../class/Empleado.php';

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

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

		        <form name="frmDatos" method="POST" action="procesar/modificar.php">
	      
              <div class="card-body">
                
                <div class="#">
                  <label for="txtId"></label>
                  <input type="hidden" class="form-control" name="txtId" value="<?php echo $empleado->getIdEmpleado(); ?>">
                </div>
    			      
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
      				        <label for="txtNombre">Nombre:</label>
      				        <input type="text" class="form-control" name="txtNombre" value="<?php echo $empleado->getNombre(); ?>">
    			          </div>
                  </div>
                
                  <div class="col-sm-6">
    			          <div class="form-group">
      				        <label for="txtApellido">Apellido:</label>
      				        <input type="text" class="form-control" name="txtApellido" value="<?php echo $empleado->getApellido(); ?>">
    			          </div>
                  </div>
                </div>
  			      

			          <div class="form-group">
    			        <label for="txtFechaNacimiento">Fecha de Nacimiento:</label>
                  <input type="date" class="form-control" name="txtFechaNacimiento" value="<?php echo $empleado->getFechaNacimiento(); ?>">
                </div>

                <div class="row">
                  <div class="col-sm-6">
  				          <div class="form-group">
      				        <label for="optTipoDocumento">Tipo de Documento:</label>
                      <select name="cboTipoDocumento" class="form-control">
        					      <option value="0">Seleccionar...</option>
        					      <!--<option value="DNI">DNI</option>-->
        					      <!--<option value="Pasaporte">Pasaporte</option>-->
        					      <!--<option value="Cedula">Cedula</option>-->
      					      </select>
    			          </div>
                  </div>

                  <div class="col-sm-6">
    			          <div class="form-group">
      				        <label for="txtNumeroDocumento">Número de Documento:</label>
      				        <input type="number" class="form-control" name="txtNumeroDocumento" value="<?php echo $empleado->getNumeroDocumento(); ?>">
    			          </div>
                  </div>
  			        </div>

		            <div class="form-group">
    				      <label for="txtNumeroLegajo">Numero Legajo:</label>
    				      <input type="number" class="form-control" name="txtNumeroLegajo" value="<?php echo $empleado->getNumeroLegajo(); ?>">
  			        </div>

			        </div>

			        <div class="card-body">
                
                <a href="listadoEmpleado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
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