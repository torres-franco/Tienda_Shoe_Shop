<?php

require_once '../../class/Categoria.php';
//require_once '../../class/Marca.php';
require_once '../../class/Producto.php';

$listadoCategoria = Categoria::obtenerTodos();
//$listadoMarca = Marca::obtenerTodos();


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
            <h1 class="m-0 text-dark">Aumento de precios por Categorías</h1>
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
                <h3 class="card-title">
                  Asegúrese de completar los campos correctamente.
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" id="frmDatos">
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="cboCategoria">Categoría:</label>
                          <select name="cboCategoria" class="form-control" id="cboCategoria">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoCategoria as $categoria): ?>

                              <option value="<?php echo $categoria->getIdCategoria(); ?>">
                              <?php echo $categoria; ?>
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
    let idCategoria = $('#cboCategoria').val();
    let aumento = $('#txtAumento').val();
    console.log (aumento);
    $.ajax({
        type: 'GET',
        url : 'procesar/guardarCategoria.php',
        data: {
            'idCategoria': idCategoria,
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




