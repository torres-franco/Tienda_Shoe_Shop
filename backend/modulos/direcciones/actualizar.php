<?php

require_once '../../class/Direccion.php';
require_once '../../class/Barrio.php';
require_once '../../class/Ciudad.php';
require_once '../../class/Provincia.php';

$id = $_GET['idDireccion'];
$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];

$direccion = direccion::obtenerPorIdPersona($idPersona);

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
            <h1 class="m-0 text-dark">Actualizar dirección</h1>
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
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtProvincia">Provincia:</label>
                          <select name="cboProvincia" class="form-control">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoProvincia as $provincia):
                                $selected = '';
                                
                                if ($provincia->getIdProvincia() == $provincia->getIdProvincia()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $provincia->getIdProvincia(); ?>"
                                <?php echo $selected; ?>>
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

                              <?php foreach ($listadoCiudad as $ciudad):
                                $selected = '';
                                
                                if ($ciudad->getIdCiudad() == $ciudad->getIdCiudad()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $ciudad->getIdCiudad(); ?>"
                                <?php echo $selected; ?>>
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

                              <?php foreach ($listadoBarrio as $barrio):
                                $selected = '';
                                
                                if ($direccion->getIdBarrio() == $barrio->getIdBarrio()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $barrio->getIdBarrio(); ?>"
                                <?php echo $selected; ?>>
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
                      <label for="txtIdDireccion"></label>
                      <input type="hidden" name="txtIdDireccion" value="<?php echo $id ?>">
                    </div>

                    <div>
                      <label for="txtIdLlamada"></label>
                      <input type="hidden" name="txtIdLlamada" value="<?php echo $idLlamada ?>">
                    </div>
                  
                    <div>
                      <label for="txtModulo"></label>
                      <input type="hidden" name="txtModulo" value="<?php echo $moduloLlamada ?>">
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtCalle">Calle:</label>
                      <input type="text" class="form-control" name="txtCalle" value="<?php echo $direccion->getCalle(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtAltura">Altura:</label>
                        <input type="text" class="form-control" name="txtAltura" value="<?php echo $direccion->getAltura(); ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtPiso">Piso:</label>
                      <input type="text" class="form-control" name="txtPiso" value="<?php echo $direccion->getPiso(); ?>">
                    </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="txtManzana">Manzana:</label>
                        <input type="text" class="form-control" name="txtManzana" value="<?php $direccion->getAltura(); ?>">
                      </div>
                    </div>

                    
                  </div>




                </div>
                <!-- /.card-body -->

                <div class="card-body">
                
                      <a href="../<?php echo $moduloLlamada ?>/detalle.php?id=<?php echo $idLlamada ?>" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Cancelar</a>
                  
                  
                      <button type="submit" class="btn btn-primary float-right">Actualizar <i class="fas fa-sync"></i></button>
                   
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