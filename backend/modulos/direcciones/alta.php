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
            <h1 class="m-0 text-dark">Carga de Direccion (Sólo prueba del insert)</h1>
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
                <h3 class="card-title">Probando Insert de Dirección</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">

                  
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtCalle">Calle:</label>
                      <input type="text" class="form-control" name="txtCalle">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtAltura">Altura:</label>
                        <input type="text" class="form-control" name="txtAltura">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtManzana">Manzana:</label>
                        <input type="text" class="form-control" name="txtManzana">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtTorre">Torre:</label>
                        <input type="text" class="form-control" name="txtTorre">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtPiso">Piso:</label>
                        <input type="number" class="form-control" name="txtPiso">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtNumeroPuerta">N° de Puerta:</label>
                        <input type="number" class="form-control" name="txtNumeroPuerta">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtSector">Sector:</label>
                        <input type="text" class="form-control" name="txtSector">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtReferencia">Referencia:</label>
                        <input type="textReferencia" class="form-control" name="txtReferencia">
                      </div>
                    </div>
                  </div>


                  <!--<div class="form-group">
                    <label for="txtGenero">Género:</label>
                    <input type="text" class="form-control" name="txtGenero">
                  </div>-->

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listadoDireccion.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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