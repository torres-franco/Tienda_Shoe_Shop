<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

/*highlight_string(var_export($cliente, true));
exit;*/


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
            <h1 class="m-0 text-dark">Detalle del cliente</h1>
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
              

            <div class="card-body p-0">
              <table class="table table-hover text-center">
  		          <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Género</th>
                    <th>Estado</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td> <?php echo $cliente->getIdCliente(); ?> </td>
                    <td> <?php echo $cliente->getNombre(); ?> </td>
                    <td> <?php echo $cliente->getApellido(); ?> </td>
                    <td> <?php echo $cliente->getDni(); ?> </td>
                    <td> <?php echo $cliente->getFechaNacimiento(); ?> </td>
                    <td> <?php echo $cliente->getGenero(); ?> </td>
                    <td> <?php echo $cliente->getEstado(); ?> </td>           
                  </tr>
                </tbody>
              </table>
            </div>



    <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>
  
      </div>

    

      <div class="row">
          <div class="col-6">
            <div class="card">
              

            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    
                    <th>Contactos

                      <a href="/proyecto_shoe_shop/backend/modulos/contactos/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">

                      <i class="fas fa-plus-circle"></i> Agregar

                      </a>

                    </th>
                  </tr>
                </thead>

                <tbody class="text-center">
                  <tr>    

                    <td>

                      <?php foreach ($cliente->arrContactos as $contacto) : ?>

                      <?= utf8_encode($contacto); ?>

                        <a class="btn btn-link btn-sm text-danger" href="/proyecto_shoe_shop/backend/modulos/contactos/procesar/eliminar.php?id=<?php echo $contacto->getIdTipoContactoPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes" role="button" title="Eliminar">
                          <i class="fas fa-times"></i>
                        </a> 

                        <br>

                      <?php endforeach ?>

                    </td>                   
                    
                  </tr>
                </tbody>
              </table>
            </div>
            
    <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>

      
        <div class="col-6">
          <div class="card">

            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    
                    <th>Dirección

                      <?php if (is_null($cliente->direccion)) : ?>


                      <a href="/proyecto_shoe_shop/backend/modulos/direcciones/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
                      <i class="fas fa-plus-circle"></i> Agregar
                      </a>

                      <?php else: ?>

                      <a href="/proyecto_shoe_shop/backend/modulos/direcciones/actualizar.php?idDireccion=<?php echo $cliente->direccion->getIdDireccion(); ?>&idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
                      <i class="fas fa-edit" title="Editar dirección"></i>
                      </a>

                    </th>
                  </tr>
                </thead>

                <tbody class="text-center">
                  <tr>    

                  <td><strong>Dirección:</strong><br> 
                    <?php echo $cliente->direccion; ?> 
                  </td>
                  <td><strong>Barrio:</strong><br> 
                    <?php echo utf8_encode($cliente->direccion->barrio->getDescripcion()); ?> </td>
                  <td><strong>Ciudad:</strong><br>
                    <?php echo utf8_encode($cliente->direccion->barrio->ciudad->getNombre()); ?> 
                  </td>
                  <td><strong>Código Postal:</strong><br>
                    <?php echo utf8_encode($cliente->direccion->barrio->ciudad->getCodigoPostal()); ?> 
                  </td>
                  <td><strong>Provincia:</strong><br>
                    <?php echo utf8_encode($cliente->direccion->barrio->ciudad->provincia->getNombre()); ?> 
                  </td>
                  <td><strong>Calle:</strong><br>
                    <?php echo utf8_encode($cliente->direccion->getCalle()); ?> 
                  </td>    
                    

                  <?php endif ?>                 
                    
                  </tr>
                </tbody>
              </table>
            </div>


            
    <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>
  
      <!--</div>-->

      </div>


    </section>

  </div>

<?php

include('../../footer.php');

?>

</body>
</html>