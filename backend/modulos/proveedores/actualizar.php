<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

?>

<!doctype html>
<html lang="es">

<script type="text/javascript">
    function validarDatos() {
    /*alert(88998989898);*/
    var divMensajeError = document.getElementById("mensajeError");
    var razonSocial = document.getElementById("txtRazonSocial").value;
    if (razonSocial.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "La razón social no debe estar vacia *";
        return;
    } else if (razonSocial.length < 2) {
      
        divMensajeError.innerHTML = "La razón social debe tener al menos 3 carácteres *";
        return;
    }

    var cuit = document.getElementById("txtCuit").value;
    if (cuit.trim() == "") {
        //alert("El nombre no debe estar vacio");
        divMensajeError.innerHTML = "El CUIT no debe estar vacio *";
        return;
    } else if (cuit.length < 9) {
      
        divMensajeError.innerHTML = "El CUIT debe tener al menos 10 carácteres *";
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
            <h1 class="m-0 text-dark">Actualizar de Proveedor</h1>
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

                  
                  <div class="row">

                    <div class="#">
                      <label for="txtId"></label>
                      <input type="hidden" class="form-control" name="txtId" value="<?php echo $proveedor->getIdProveedor(); ?>">
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRazonSocial">Razon Social:</label>
                      <input type="text" class="form-control" name="txtRazonSocial" id="txtRazonSocial" value="<?php echo $proveedor->getRazonSocial(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtCuit">CUIT:</label>
                        <input type="text" class="form-control" name="txtCuit" id="txtCuit" value="<?php echo $proveedor->getCuit(); ?>">
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listado.php" class="btn btn-secondary" role="button"> Cancelar</a>
                  
                  
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