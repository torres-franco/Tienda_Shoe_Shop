<?php

//require_once '../../class/Cliente.php';


require_once '../../class/Barrio.php';
require_once '../../class/Ciudad.php';
require_once '../../class/Provincia.php';

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];

$listadoBarrio = Barrio::obtenerTodos();
$listadoCiudad = Ciudad::obtenerTodos();
$listadoProvincia = Provincia::obtenerTodos();

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
            <h1 class="m-0 text-dark">Carga de dirección</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right pt-2">
              <li class="breadcrumb-item">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Provincia
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="../provincias/alta.php">Agregar</a>
                      <a class="dropdown-item" href="../provincias/listado.php">Ver listado</a>
                    </div>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ciudad
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="../ciudades/alta.php">Agregar</a>
                      <a class="dropdown-item" href="../ciudades/listado.php">Ver listado</a>
                    </div>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Barrio
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="../barrios/alta.php">Agregar</a>
                      <a class="dropdown-item" href="../barrios/listado.php">Ver listado</a>
                    </div>
                  </div>
                  
                </div>
              </li>   
            </ol>
          </div>

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
              <form name="frmDatos" method="POST" action="procesar/guardar.php">
                <div class="card-body">

                  <div class="row">

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtBarrio">Provincia:</label>
                          <select name="cboBarrio" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoProvincia as $provincia): ?>

                              <option value="<?php echo $provincia->getIdProvincia(); ?>">
                              <?php echo $provincia; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtCiudad">Ciudad:</label>
                          <select name="cboCiudad" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoCiudad as $ciudad): ?>

                              <option value="<?php echo $ciudad->getIdCiudad(); ?>">
                              <?php echo $ciudad; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtBarrio">Barrio:</label>
                          <select name="cboBarrio" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoBarrio as $barrio): ?>

                              <option value="<?php echo $barrio->getIdBarrio(); ?>">
                              <?php echo $barrio; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                  </div>

                  <hr/>
                  
                  <div class="row">

                    <div>
                      <label for="txtIdPersona"></label>
                      <input type="hidden" name="txtIdPersona" value="<?php echo $idPersona ?>">
                    </div>
                    <div>
                      <label for="txtIdLlamada"></label>
                      <input type="hidden" name="txtIdLlamada" value="<?php echo $idLlamada ?>">
                    </div>
                    <!--<div>
                      <label for="txtIdProveedor"></label>
                      <input type="hidden" name="txtIdProovedor" value="<?php echo $idProovedor ?>">
                    </div>-->
                    <div>
                      <label for="txtModulo"></label>
                      <input type="hidden" name="txtModulo" value="<?php echo $moduloLlamada ?>">
                    </div>

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
                      <label for="txtPiso">Piso:</label>
                      <input type="text" class="form-control" name="txtPiso">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtManzana">Manzana:</label>
                        <input type="text" class="form-control" name="txtManzana">
                      </div>
                    </div>


                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../<?php echo $moduloLlamada ?>/detalle.php?id=<?php echo $idLlamada ?>" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
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