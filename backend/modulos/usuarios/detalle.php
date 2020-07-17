<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

?>

<!doctype html>
<html lang="es">


<?php
  include('../../header.php');
?>

<body>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalle del usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item"><a href="listado.php"><i class="fas fa-arrow-left pt-2"></i> Volver</a></li>   
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
	
	    
    <section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              

            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
  		          <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <!--<th>DNI</th>-->
                    <th>Usuario</th>
                    <th>Estado</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td> <?php echo $usuario->getIdUsuario(); ?> </td>
                    <td> <?php echo $usuario->getNombre(); ?> </td>
                    <td> <?php echo $usuario->getApellido(); ?> </td>
                    <!--<td> <?php echo $usuario->getDni(); ?> </td>-->
                    <td> <?php echo $usuario->getUser(); ?> </td>
                    <td> <?php echo $usuario->getEstado(); ?> </td>
                  </tr>
                </tbody>
              </table>
            </div>
    <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>
  
      </div>

    </section>

  </div>

<?php

include('../../footer.php');

?>

</body>
</html>