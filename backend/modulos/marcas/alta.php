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
            <h1 class="m-0 text-dark">Carga de marcas</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item">
                <a class="btn btn-outline-primary btn-sm" href="listado.php">
                  <i class="fas fa-list"></i>
                  Listado
                </a>
              </li> 
            </ol>
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
                <h3 class="card-title">Asegurese de ingresar la marca correctamente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">


                  <div class="row">

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="txtDescripcion">Marca:</label>
                        <input type="text" class="form-control" name="txtDescripcion">
                      </div>
                    </div>

                    

                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../productos/alta.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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