<?php

require_once '../../class/Cliente.php';

const CLIENTE_GUARDADO = 1;
const CLIENTE_MODIFICADO = 2;
const CLIENTE_ELIMINADO = 3;

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

} else {
    
    $mensaje = 0;

}


$listadoClientes = Cliente::obtenerTodos();

?>

<!doctype html>
<html lang="es">

<body>

  <?php
  include ('../../header.php');
  ?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Registro de clientes</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <?php if ($mensaje == CLIENTE_GUARDADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cliente guardado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == CLIENTE_MODIFICADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cliente actualizado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php elseif ($mensaje == CLIENTE_ELIMINADO): ?>
      <div class="content">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cliente eliminado correctamente.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>

    <?php endif ?>

    <section class="content">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                	<a href="alta.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-user-plus"></i> Agregar</a>
                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm pt-1" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar por DNI">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-responsive-lg table-hover text-center">
                  <thead>
                    <tr>
                      <th>DNI</th>
						          <th>Nombre</th>
						          <th>Apellido</th>
						          <th>Fecha Nacimiento</th>
						          <th>Acciones</th>
                    </tr>
                  </thead>

                  	<?php foreach ($listadoClientes as $cliente): ?>

                  	<tbody>
                  
                      <tr>
							           <td> <?php echo $cliente->getDni(); ?> </td>
							           <td> <?php echo $cliente->getNombre(); ?> </td>
							           <td> <?php echo $cliente->getApellido(); ?> </td>
                         <td> <?php echo $cliente->getFechaNacimiento(); ?> </td>
							           <td> 
								            <a class="btn btn-info btn-sm" href="detalle.php?id=<?php echo $cliente->getIdCliente(); ?>" role="button" title="Ver">
                                <i class="fas fa-eye"></i>
                            </a>
                            
								            <a class="btn btn-success btn-sm" href="actualizar.php?id=<?php echo $cliente->getIdCliente(); ?>" role="button" title="Editar">    <i class="fas fa-pen"></i>
                            </a>
								            
							           </td>
						          </tr>
                    
                	</tbody>

                	<?php endforeach ?>

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