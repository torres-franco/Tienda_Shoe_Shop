<?php

require_once '../../class/Pedido.php';
require_once '../../class/Cliente.php';
require_once '../../class/EstadoPedido.php';


$id = $_GET['id'];

$pedido = Pedido::obtenerPorId($id);

$listadoCliente = Cliente::obtenerTodos();
$listadoEstado = EstadoPedido::obtenerTodos();

//highlight_string(var_export($listadoEstado, true));
//exit;

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
            <h1 class="m-0 text-dark">Actualizar Pedido N°: <?php echo $pedido->getIdPedido();  ?>
                 
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content col-md-12">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  

                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
           
                <div class="card-body">

                  <div class="row">        

                    <input type="hidden" name="txtIdPedido" id="txtIdPedido" value="<?php echo $pedido->getIdPedido(); ?>">

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="txtFecha">Fecha:</label>
                        <input type="date" class="form-control" name="txtFecha" id="txtFecha" value="<?php echo $pedido->getFechaPedido(); ?>">

                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="cboCliente">Cliente:</label>
                          <select name="cboCliente" class="form-control" id="cboCliente">
                            <?php foreach ($listadoCliente as $cliente):
                              
                            	$selected = '';
                                
                                if ($pedido->cliente->getIdCliente() == $cliente->getIdCliente()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                            ?>
                            
                            	<option value="<?php echo $cliente->getIdCliente(); ?>"
                                	<?php echo $selected; ?>>
                                	<?php echo $cliente; ?>
                            	</option>

                            <?php endforeach ?>

                          </select>
                      </div>
                    </div>
                  

                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <label for="cboEstado">Estado:</label>
                          <select name="cboEstado" class="form-control" id="cboEstado" disabled="disabled">

                              <?php foreach ($listadoEstado as $estadoPedido):
                                $selected = '';
                                
                                if ($pedido->estadoPedido->getIdPedidoEstado() == $estadoPedido->getIdPedidoEstado()) {
                                  
                                    $selected = "SELECTED";
                                
                                }
                              ?>
                            
                              <option value="<?php echo $estadoPedido->getIdPedidoEstado(); ?>"
                                <?php echo $selected; ?>>
                                <?php echo $estadoPedido; ?>

                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                  </div>

                  <section class="content">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <div class="input-group" style="width: 400px;">
                              <input id="id_txt_buscar" type="text" name="table_search" class="form-control" placeholder="Código del producto...">
                                <div class="input-group-append">
                                  <i onclick="abrirListadoProducto()" class="btn btn-info"><i class="fas fa-search"></i></i>
                                </div>
                            </div>
                          
                          </div>
                      
                          <!-- /.card-header -->
                         <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-center" id="detalleVenta">
                            	<thead>
                              		<tr>
                                		<th>ID</th>
                                		<th>Descripción</th>
                                		<th>Cantidad</th>
                                		<th>Importe U.</th>
                                		<th>Subtotal</th>
                                		<th>Acción</th>
                              		</tr>
                            	</thead>

                				<tbody>
                      			<tr>
                      				
                      			</tr>
                    			</tbody>

                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                <div class="col-6 mt-3 pt-3">
                  <!--<p class="lead">Métodos de pagos:</p>
                  <img src="../../static/dist/img/credit/visa.png" alt="Visa">
                  <img src="../../static/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../static/dist/img/credit/paypal2.png" alt="Paypal">-->

                 
                </div>
                    <div class="col-6 mt-3 pt-3">
                      <p class="lead">Monto a pagar</p>

                      <div class="table-responsive">
                        <table class="table">
                            <tr>
                              <th>Total:</th>
                            	
                            	<td id="total">
                            		
                            		
                            	
                        		</td>
                        		
                            </tr>
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </section>
              </div>

                <!-- /.card-body -->

                <div class="card-body">
    
                  <a href="listado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Volver</a>

                  <button type="button" onclick="guardarPedido()" class="btn btn-primary float-right">Guardar <i class="fas fa-save"></i></button>
                   
                </div>


            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->

    <!--MODAL -->
    <div class="modal fade" id="listadoProducto">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">
                Listado de Productos:
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="input-group" style="width: 250px;">
                  <input id="id_txt_buscar" type="text" name="table_search" class="form-control" placeholder="Buscar producto...">

                  <div class="input-group-append">
                    <button onclick="buscarProducto()" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>

                <table class="table table-borderless text-center" id="tablaProducto">
                  <thead>
                    <tr>
                      <th>#Código</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Stock Disponible</th>
                    </tr>
                  </thead> 

                  <tbody>
                  
                      <tr>
                     
                      </tr>
  
                  </tbody>

                </table>
            </div>
            
            <div class="modal-footer justify-content-between">

              <button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
  
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
      <!-- /MODAL -->

    </div>
  <!-- /.content-wrapper -->


<?php 
  include('../../footer.php');
?>

</body>

<script>

/*------------------
variables globales
-------------------*/

var total = 0.0;
var vuelto = 0.0;
var detalle_venta = []; // array*/
var indice = 0; //indice del array
/*--------------
    funcion para cargar modal de productos
--------------*/
$.ajax({
    type: 'GET',
    url : '../../utils/productos/buscarProducto.php',
    data: {},
    success: function(data){
        var datos = JSON.parse(data);
        //console.log(datos);
        for (var x=0; x < datos.length; x++){
          console.log(datos[x]);

          row = generarFila(
              
            datos[x]._idProducto,
            datos[x].categoria._descripcion,
            datos[x].marca._descripcion,
            datos[x]._descripcion, 
            datos[x]._precio,
            datos[x]._stockActual
            
          );

            $('#tablaProducto tr:last').after(row)
        }
    }
})


    function generarFila(id, descripcionCategoria, descripcionMarca, descripcion, precio, stockActual) {
      
      var row = '<tr onclick="setCantidadProducto(';
      row += id + ",'";
     
      row += descripcionCategoria + " " + descripcionMarca + " " + descripcion + "',";
      row += precio + ",";
      row += stockActual + ')"><td>';
      row += id + '</td><td>';
      row += descripcionCategoria + " " + descripcionMarca + " " + descripcion + '</td><td>';
      row += '$' + precio + '</td><td>';
      row += stockActual + '</td><tr>';
    
      return row;
    
    }


function setCantidadProducto(id, descripcion, precio, stockActual){
  let cantidad = prompt('Ingrese la cantidad')

  if (cantidad == null || cantidad == ""){ //validación de agregar productos
    return false;
  }
  if(isNaN(cantidad)){
    alert("Uups! No es número.");
    return false;
  }
  if(cantidad > stockActual){
      alert("Uups! el stock insuficiente.");
      return;
  }

  let subtotal = calcularSubtotal(cantidad, precio);
  let items = {}; //items del detalle

  items['id_producto'] = id;
  items['cantidad'] = cantidad;
  items['precio'] = precio;

  detalle_venta.push(items); //armando detalle para el envio

  $('#detalleVenta tr:last').after('<tr id=' + indice +'><td>' + id + '</td><td>' + descripcion + '</td><td>' + cantidad + '</td><td>$' + precio + '</td><td>$' + subtotal + '</td><td> <button type="button" onclick="eliminarArticulo(' + indice + ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>')

  indice -= 1;

}




function abrirListadoProducto(){
    $('#listadoProducto').modal('show');
}


/*------------------
    funciones de calculo
-------------------*/


function calcularSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total += resultado;
    $('#total').text('$' + total);
    return resultado;
}

function restarSubtotal(cantidad, precio){
    let resultado = parseFloat(cantidad) * parseFloat(precio);
    total -= resultado;
    $('#total').text('$' + total);
    return resultado;
}

$('#pago').on('keypress',function(e) {
    if(e.which == 13) {
      calcularVuelto();
    }
});


//Delegación de eventos.
/*$('#detalleVenta' ).on( "click", ".eliminarProducto", function() {
  $(this).parent().parent().remove();
});*/

function calcularVuelto(){
    let valor_pago = $('#pago').val();
    let resultado =  valor_pago - total;
    $('#vuelto').text('$' + resultado);
}



/*------------------
    funciones de calculo
-------------------*/

/*--------------------------
eliminar producto
--------------------------*/

function eliminarArticulo(i){
  $('#' + i).remove(); // removemos de la tabla
  restarSubtotal(detalle_venta[i].cantidad, detalle_venta[i].precio);
    detalle_venta.splice(i, 1); // quita un elemento del array
 
}

/*--------------------------
eliminar producto
--------------------------*/

/*--------------------------
buscar por codigo el producto
--------------------------*/
function buscarProducto(){
  $.ajax({
    type: 'GET',
    url : '../../utils/productos/buscarProducto.php',
    data: {
      'text_buscar': $('#id_txt_buscar').val()
    },
    success: function(data){
        var datos = JSON.parse(data);
        //console.log(datos);
        $('#tablaProducto tbody tr').empty();
        for (var x=0; x < datos.length; x++){
            console.log(datos[x]);
            row = generarFila(
              
              datos[x]._idProducto, 
              datos[x]._descripcion, 
              datos[x]._precio,
              datos[x]._stockActual

            );

            $('#tablaProducto tr:last').after(row)
        }
    }
  })
}


/*------------------
 guardar formulario
----------------*/

  function guardarPedido(){

  	let idPedido = $('#txtIdPedido').val();
    let fecha = $('#txtFecha').val();
    let cliente = $('#cboCliente').val();
    let metodoPago = $('#cboMetodoPago').val();
    let estado = $('#cboEstado').val();

    if(detalle_venta.length >0){
      $.ajax({
        type: 'POST',
        url: 'procesar/modificar.php',
        data: {
          'idPedido': idPedido,
          'fecha': fecha,
          'cliente': cliente,
          'metodoPago': metodoPago,
          'estado': estado,
          'items': detalle_venta
        },
        success: function(data){
         window.location.href = 'listado.php?mensaje=2';
        }
      })
    } else {
      alert('Error! Debe cargar un producto.');
    }
  }

//alert ($('#txtIdPedido').val());

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
</html>