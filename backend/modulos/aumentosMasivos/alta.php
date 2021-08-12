<?php

require_once '../../class/Marca.php';
require_once '../../class/Producto.php';

$listadoMarca = Marca::obtenerTodos();


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
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Aumento de precios por Marcas</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

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
                <h3 class="card-title">
                  Asegúrese de completar los campos correctamente.
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" id="frmDatos" method="GET" action="procesar/guardar.php">
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="cboMarca">Marca:</label>
                          <select name="cboMarca" class="form-control" id="cboMarca">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoMarca as $marca): ?>

                              <option value="<?php echo $marca->getIdMarca(); ?>">
                              <?php echo $marca; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>
              

                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="txtAumento">Aumento en %:</label>
                        <input type="number" class="form-control" name="txtAumento" id="txtAumento">
                      </div>
                    </div>

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                      
                      <a href="../../modulos/productos/listado.php" class="btn btn-secondary" role="button">Cancelar</a>
                  
                      <input class="btn btn-primary float-right" type="button" onclick="guardar();" value="Aplicar aumento">
                   
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

<script>
  function guardar(){
    let idMarca = $('#cboMarca').val();
    let aumento = $('#txtAumento').val();

    var divMensajeError = document.getElementById("mensajeError"); 
    if (idMarca == 0){
        divMensajeError.innerHTML = "Debe seleccionar una marca *";
        return;
    }

    if (aumento == ""){
        divMensajeError.innerHTML = "Debe ingresar un porcentaje *";
        return;
    }

    if(aumento <= 0){
        divMensajeError.innerHTML = "El porcentaje no debe contener caracteres negativo o nulo";
        return;
    }

    //console.log (aumento);
    $.ajax({
        type: 'GET',
        url : 'procesar/guardar.php',
        data: {
            'idMarca': idMarca,
            'aumento': aumento
        },
        success: function(data){
          window.location.href = '../../modulos/productos/listado.php?mensaje=4';
            //console.log(data)
        }
    })
  }

</script>

</html>




