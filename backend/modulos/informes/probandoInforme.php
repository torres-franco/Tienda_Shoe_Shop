<?php

require_once '../../class/Marca.php';




?>

<!DOCTYPE html>
<html lang="es">



<body>

  <?php

  include('../../header.php');

  ?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informes de Ventas</h1>
          </div>
          <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right pt-1">
                    <li class="breadcrumb-item">

                        <a class="btn btn-primary btn-sm" href="listado.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Stock
                        </a>
                        <a class="btn btn-primary btn-sm" href="venta.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Ventas
                        </a>
                        <a class="btn btn-primary btn-sm" href="productoMasVendido.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Productos más vendidos
                        </a>

                    </li>   
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    

<section class="content">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <form method='GET' id="formFilter">
                <h3 class="card-title">
                  <div class="col-sm-12">
                    <div class="form-group">
                       
                      <select name="cboMarca" class="form-control" id="cboMarca">
                          <option value="Sin seleccionar">Seleccionar Marca</option>

                          <?php foreach ($listadoMarca as $marca): ?>

                          <option value="<?php echo $marca->getIdMarca(); ?>">
                          <?php echo $marca; ?>
                          </option>

                          <?php endforeach ?>

                      </select>
                    </div>
                  </div>
                </h3>

                <div class="card-tools">
                  <div class="row col-6">
                      <strong class="pt-1">Desde:</strong>
                      <div class="col-sm-4">
                        
                        <input type="date" class="form-control" name="txtFechaDesde" required="required">
                      
                      </div>
                      <strong class="pt-1">Hasta:</strong>
                      <div class="col-sm-4">
                        
                        <input type="date" class="form-control" name="txtFechaHasta" required="required">
                      
                      </div>

                      <div class="col-sm-1">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit" title="Filtrar"><i class="fas fa-filter"></i></button>
                      </div>
                    
                  </div>
                  
                </div>
                </form>

              </div>
     
              <div class="card-body p-0">
                 
                <table class="table table-hover text-center" id="tabla">
                  <thead>
                    <tr>
                        <th>Fecha Emisión</th>
                        <th>Cantidad</th>
                        <th>Descripcion</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                 

                    <tbody>
                      <tr>
                            
                      </tr>
                    </tbody>

                </table>
              </div>
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
<script>
  
$.ajax({
    type: 'GET',
    url : '../../utils/productos/obtenerPedidoPorId.php',
    data: {'idPedido': $('#txtIdPedido').val() },
    success: function(data){
        var datosDetallePedido = JSON.parse(data);
        //console.log(datosDetallePedido);
        for (var x=0; x < datosDetallePedido._arrDetallePedido.length; x++){
          console.log(datosDetallePedido._arrDetallePedido[x]);

            let subtotal = calcularSubtotal(datosDetallePedido._arrDetallePedido[x]._cantidad, datosDetallePedido._arrDetallePedido[x]._precio);

           let items = {}; //items del detalle


            items['id_producto'] = datosDetallePedido._arrDetallePedido[x]._idProducto;
        items['cantidad'] = datosDetallePedido._arrDetallePedido[x]._cantidad;
        items['precio'] = datosDetallePedido._arrDetallePedido[x]._precio;

            detalle_venta.push(items); //armando detalle para el envio

        $('#detalleVenta tr:last').after('<tr id=' + indice +'><td>' + datosDetallePedido._arrDetallePedido[x]._idProducto + '</td><td>' + datosDetallePedido._arrDetallePedido[x].producto._descripcion + '</td><td>' + datosDetallePedido._arrDetallePedido[x]._cantidad + '</td><td>$' + datosDetallePedido._arrDetallePedido[x]._precio + '</td><td>$' + subtotal + '</td><td> <button type="button" onclick="eliminarArticulo(' + indice + ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>')

        indice += 1;


        }
    }
})

</script>
