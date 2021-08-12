<?php

require_once '../../class/Proveedor.php';
require_once '../../class/Producto.php';
require_once '../../class/Compra.php';
require_once '../../class/TipoPago.php';
require_once '../../class/EstadoCompra.php';

$listadoProveedor = Proveedor::obtenerProveedor();

$listadoEstado = EstadoCompra::obtenerTodos();

//$listadoCompra = Compra::obtenerTodos();

$listadoProducto = Producto::obtenerTodo();

$listadoTipoPago = TipoPago::obtenerTodos();

//highlight_string(var_export($listadoCompra, true));
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
            <h1 class="m-0 text-dark">Nueva Compra</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <h5 class="text-center">
      <div id="mensajeError" class="text-danger"></div>
    </h5>
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
              <form name="frmDatos">
                <div class="card-body">

                  <div class="row">

                    <div class="col-md-3 mb-3">
                      <div class="form-group">
                        <label for="txtFecha">Fecha:</label>
                        <input type="date" class="form-control" name="txtFecha" id="txtFecha" value="<?php echo date("Y-m-d");?>">

                      </div>
                    </div>

                    <div class="col-md-3 mb-3">
                      <div class="form-group">
                        <label for="cboProveedor">Proveedor:</label>
                          <select name="cboProveedor" class="form-control" id="cboProveedor">
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoProveedor as $proveedor): ?>

                              <option value="<?php echo $proveedor->getIdProveedor(); ?>">
                              <?php echo $proveedor; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-3 mb-3">
                      <div class="form-group">
                        <label for="cboEstado">Estado:</label>
                          <select name="cboEstado" class="form-control" id="cboEstado" disabled="disabled">
                              
                              <!--<option value="0">Seleccionar</option>-->

                              <?php foreach ($listadoEstado as $estado): ?>

                              <option value="<?php echo $estado->getIdEstadoCompra(); ?>">
                              <?php echo $estado; ?>
                              </option>

                              <?php endforeach ?>

                          </select>
                      </div>
                    </div>

                    <div class="col-md-3 mb-3">
                      <div class="form-group">
                        <label for="cboTipoPago">Tipo de pago:</label>
                          <select name="cboTipoPago" class="form-control" id="cboTipoPago">
                              
                              <option value="0">Seleccionar</option>

                              <?php foreach ($listadoTipoPago as $tipoPago): ?>

                              <option value="<?php echo $tipoPago->getIdTipoPago(); ?>">
                                <?php echo utf8_encode($tipoPago); ?>
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
                              <input id="id_txt_buscar_codigo" type="text" name="table_search" class="form-control" placeholder="Código del producto...">
                                <div class="input-group-append">
                                  <i onclick="abrirListadoProducto()" class="btn btn-info"><i class="fas fa-search"></i></i>
                                </div>
                            </div>
                          
                          </div>
                      
                          <!-- /.card-header -->
                          <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-center" id="detalleCompra">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Importe U.</th>
                                <th>Subtotal</th>
                                <th>acción</th>
                              </tr>
                            </thead>

                            <tbody>

                  
                    
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
                              <th class="">Total:</th>
                              <td id="total">$0,00</td>
                            </tr>
                            <!--<tr>
                              <th>Pago con:</th>
                              <td>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                  </div>
                                  <input id="pago" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th style="width:50%">Vuelto:</th>
                              <td id="vuelto">$0,00</td>
                            </tr>-->

                        </table>

                      </div>
                    </div>

                  </div>
                </section>
              </div>

                <!-- /.card-body -->

                <div class="card-body">
    
                  <a href="listado.php" class="btn btn-secondary" role="button"><i class="fas fa-arrow-left pt-2"></i> Volver</a>

                  <button type="button" onclick="guardarCompra()" class="btn btn-primary float-right">Registrar Compra <i class="fas fa-save"></i></button>
                   
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
                      <th>Precio Compra</th>
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
var detalle_compra = []; // array*/
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
            datos[x]._precio

          );

            $('#tablaProducto tr:last').after(row)
        }
    }
})


    function generarFila(id, descripcionCategoria, descripcionMarca, descripcion, precio) {
      
      var row = '<tr onclick="setCantidadProducto(';
      row += id + ",'";
     
      row += descripcionCategoria + " " + descripcionMarca + " " + descripcion + "',";
      row += precio + ')"><td>';
      row += id + '</td><td>';
      row += descripcionCategoria + " " + descripcionMarca + " " + descripcion + '</td><td>';
      row += '$' + precio + '</td><tr>';
    
      return row;
    
    }

function setCantidadProducto(id, descripcion, precio){
  let cantidad = prompt('Ingrese la cantidad')

  if (cantidad == null || cantidad == ""){ //validación de agregar productos
    return false;
  }
  if(isNaN(cantidad)){
    alert("Uups! No es número.");
    return false;
  }
  /*if(cantidad > stockActual){
      alert("Uups! el stock insuficiente.");
      return;
  }*/

  let subtotal = calcularSubtotal(cantidad, precio);
  let items = {}; //items del detalle

  items['id_producto'] = id;
  items['cantidad'] = cantidad;
  items['precio'] = precio;

  detalle_compra.push(items); //armando detalle para el envio

  $('#detalleCompra tr:last').after('<tr id=' + indice + '><td>' + id + '</td><td>' + descripcion + '</td><td>' + cantidad + '</td><td>$' + precio + '</td><td>$' + subtotal + '</td><td> <button type="button" onclick="eliminarArticulo(' + indice + ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button></td></tr>')

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

/*function calcularVuelto(){
    let valor_pago = $('#pago').val();
    let resultado =  valor_pago - total;
    $('#vuelto').text('$' + resultado);
}*/



/*------------------
    funciones de calculo
-------------------*/

/*--------------------------
eliminar producto
--------------------------*/

function eliminarArticulo(i){
  $('#' + i).remove(); // removemos de la tabla
  restarSubtotal(detalle_compra[i].cantidad, detalle_compra[i].precio);
    detalle_compra.splice(i, 1); // quita un elemento del array
 
}

/*--------------------------
eliminar producto
--------------------------*/

/*--------------------------
buscar por codigo el producto
--------------------------*/
function buscarProducto(){
  //alert($('#id_txt_buscar').val());
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
              datos[x]._precio

            );

            $('#tablaProducto tr:last').after(row)
        }
    }
  })
}


/*------------------
 guardar formulario
----------------*/

  function guardarCompra(){

    let fecha = $('#txtFecha').val();
    let proveedor = $('#cboProveedor').val();
    let estado = $('#cboEstado').val();
    let tipoPago = $('#cboTipoPago').val();

    var divMensajeError = document.getElementById("mensajeError"); 
    if (proveedor == 0){
        divMensajeError.innerHTML = "Debe seleccionar un proveedor *";
        return;
    }

    if (tipoPago == 0){
        divMensajeError.innerHTML = "Debe seleccionar un tipo de pago *";
        return;
    }

    if(detalle_compra.length > 0){
      $.ajax({
        type: 'POST',
        url: 'procesar/guardar.php',
        data: {
          'fecha': fecha,
          'proveedor': proveedor,
          'estado': estado,
          'tipoPago': tipoPago,
          'items': detalle_compra
        },
        success: function(data){
          //console.log(data)
          window.location.href = 'listado.php?mensaje=1';
        }
      })
    } else {
      alert('Error! Debe cargar un producto.');
    }
  }

</script>
</html>