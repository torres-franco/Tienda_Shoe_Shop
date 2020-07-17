<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

?>


<!doctype html>
<html lang="es">

<script type="text/javascript">
    function validarDatos() {

    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    
    var nombre = document.getElementById("txtNombre").value;
    if (nombre.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El nombre no debe estar vacio *";
        return;
    } else if (nombre.length < 3) {
      
        divMensajeError.innerHTML = "El nombre debe tener al menos 3 carácteres *";
        return;
    }

    var apellido = document.getElementById("txtApellido").value;
    if (apellido.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El apellido no debe estar vacio *";
        return;
    } else if (apellido.length < 3) {
      
        divMensajeError.innerHTML = "El apellido debe tener al menos 3 carácteres *";
        return;
    }


    var dni = document.getElementById("txtDni").value;
    if (dni.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El DNI no debe estar vacio *";
        return;
    } else if (dni.length < 8) {
      
        divMensajeError.innerHTML = "El dni debe tener 8 carácteres *";
        return;
    }

    

    var form = document.getElementById("frmDatos");
    form.submit();

    }


    </script>

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
              <form name="frmDatos" id="frmDatos" method="POST" action="procesar/modificar.php">
                <div class="card-body">
                  
                  <div class="#">
                    <label for="txtId"></label>
                    <input type="hidden" class="form-control" name="txtId" value="<?php echo $cliente->getIdCliente(); ?>">
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtNombre">Nombre:</label>
                      <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $cliente->getNombre(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control" name="txtApellido" id="txtApellido" value="<?php echo $cliente->getApellido(); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtDni">Número de DNI:</label>
                        <input type="number" class="form-control" name="txtDni" id="txtDni" value="<?php echo $cliente->getDni(); ?>">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtFechaNacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="txtFechaNacimiento" id="txtFechaNacimiento" value="<?php echo $cliente->getFechaNacimiento(); ?>">
                      </div>
                    </div>
                  </div>

                  <!--<div class="form-group">
                    <label>Género:</label>
                    <input type="txt" class="form-control" name="txtGenero" value="<?php echo $cliente->getGenero(); ?>">
                  </div>-->

                  <div class="form-group">
                    <label>Género</label>
                    <select for="txtGenero" class="form-control" name="txtGenero">
                      <option><?php echo $cliente->getGenero(); ?></option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button"> Cancelar</a>
                  
                  
                      <input class="btn btn-primary float-right" type="button" onclick="validarDatos();" value="Actualizar">

                       <!--<input class="btn btn-primary float-right" type="submit" value="Guardar">-->
                   
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