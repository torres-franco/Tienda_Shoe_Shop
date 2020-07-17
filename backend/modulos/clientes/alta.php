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


    var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;
    if (fechaNacimiento.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La fecha de nacimiento no debe estar vacía *";
        return;
    }

    var dni = document.getElementById("txtDni").value;
    if (dni.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El DNI no debe estar vacio *";
        return;
    } else if (dni.length < 8) {
      
        divMensajeError.innerHTML = "El DNI debe tener al menos 8 carácteres *";
        return;
    }


    var genero = document.getElementById("txtGenero").value;
    if (genero.trim() == 0) {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "Debe seleccionar un género *";
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
            <h1 class="m-0 text-dark">Carga de clientes</h1>
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
              <form name="frmDatos" id="frmDatos" method="POST" action="procesar/guardar.php">
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
                        <div class="form-group">
                          <label for="txtFechaNacimiento">Fecha de Nacimiento:</label>
                          <input type="date" class="form-control" name="txtFechaNacimiento" id="txtFechaNacimiento">
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtDni">Número de DNI:</label>
                        <input type="number" class="form-control" name="txtDni" id="txtDni">
                      </div>
                    </div>
                  </div>


                  <!--<div class="form-group">
                    <label for="txtGenero">Género:</label>
                    <input type="text" class="form-control" name="txtGenero">
                  </div>-->

                  <div class="form-group">
                    <label for="txtGenero">Género</label>
                    <select class="form-control" name="txtGenero" id="txtGenero">
                      <option value="0">-Seleccionar-</option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button">Cancelar</a>
                  
                      <input class="btn btn-primary float-right" type="button" onclick="validarDatos();" value="Guardar">
                     
                   
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