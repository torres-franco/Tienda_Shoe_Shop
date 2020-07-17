<!doctype html>
<html lang="es">

<!--<script type="text/javascript">
    function validarDatos() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var razonSocial = document.getElementById("txtRazonSocial").value;
    if (razonSocial.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La razón social no debe estar vacio *";
        return;
    }

    if (razonSocial.length < 2) {
        //alert("El nombre debe contener al menos 3 caracteres");
        divMensajeError.input = "El nombre debe contener al menos 1 caracteres";
        return;
    }

    var cuit = document.getElementById("txtCuit").value;
    if (cuit.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El CUIT no debe estar vacio *";
        return;
    }

    if (cuit.length < 10) {
        //alert("El nombre debe contener al menos 3 caracteres");
        divMensajeError.input = "El CUIT debe contener 10 caracteres";
        return;
    }
    

    var form = document.getElementById("frmDatos");
    form.submit();
    }

</script>-->

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
            <h1 class="m-0 text-dark">Carga de Módulos</h1>
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
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtDescripcion">Módulo:</label>
                      <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtDirectorio">Directorio:</label>
                        <input type="text" class="form-control" name="txtDirectorio" id="txtDirectorio">
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button">Cancelar</a>
                  
                      <input class="btn btn-primary float-right" type="submit" onclick="validarDatos();" value="Guardar">
                   
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