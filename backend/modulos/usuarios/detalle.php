<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuarioDetalle = Usuario::obtenerPorId($id);

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
      <div class="row justify-content-center mt-3 pt-3">
          

        <div class="col-md-5 .offset-md-3">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../imagenes/usuario/<?php echo $usuarioDetalle->getImagen(); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                  <?php echo $usuarioDetalle->getNombre(); ?>
                  <?php echo $usuarioDetalle->getApellido(); ?> 
                </h3>

                <p class="text-muted text-center"><b>User:</b> <?php echo $usuarioDetalle->getUser(); ?> </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ID</b> <a class="float-right"> <?php echo $usuarioDetalle->getIdUsuario(); ?> </a>
                  </li>
                  <li class="list-group-item">
                    <b>Perfil</b> <a class="float-right"> <?php echo $usuarioDetalle->perfil->getDescripcion(); ?> </a>
                  </li>
                  <li class="list-group-item">
                    <b>Estado</b> <a class="float-right"> <?php echo $usuarioDetalle->getEstado(); ?> </a>
                  </li>
                </ul>

                <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
              </div>
              <!-- /.card-body -->
      </div>
    </div>
  
      </div>


    </section>



  </div>

<?php

include('../../footer.php');

?>

</body>
</html>