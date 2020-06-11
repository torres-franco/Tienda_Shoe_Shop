<?php

require_once '../../class/Proveedor.php';

$id = $_GET['id'];

$proveedor = Proveedor::obtenerPorId($id);

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
            <h1 class="m-0 text-dark">Actualizar de Proveedor</h1>
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

                  
                  <div class="row">

                    <div class="#">
                      <label for="txtId"></label>
                      <input type="hidden" class="form-control" name="txtId" value="<?php echo $proveedor->getIdProveedor(); ?>">
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRazonSocial">Razon Social:</label>
                      <input type="text" class="form-control" name="txtRazonSocial" value="<?php echo $proveedor->getRazonSocial(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtCuit">CUIT:</label>
                        <input type="text" class="form-control" name="txtCuit" value="<?php echo $proveedor->getCuit(); ?>">
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="listadoProveedor.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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