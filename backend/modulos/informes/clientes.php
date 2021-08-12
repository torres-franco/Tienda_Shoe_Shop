<?php

require_once '../../class/Compra.php';

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

if (isset($_GET['cboMes'])) {
    $mes = $_GET['cboMes'];
}

$datos = NULL;

if (isset($mes) || isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($mes) || !empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha_emision, factura.numero, factura.tipo, personafisica.nombre,personafisica.apellido, SUM(pd.cantidad * pd.precio) AS total FROM factura INNER JOIN pedidodetalle AS pd ON pd.id_pedido = factura.id_pedido INNER JOIN pedido AS p ON p.id_pedido = factura.id_pedido INNER JOIN cliente ON p.id_cliente = cliente.id_cliente INNER JOIN personafisica ON personafisica.id_persona_fisica = cliente.id_persona_fisica WHERE MONTH(factura.fecha_emision) = '$mes' OR factura.fecha_emision BETWEEN '$fechaDesde' AND 'fechaHasta' GROUP BY personafisica.nombre ORDER BY total DESC LIMIT 3";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
    }
}

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
                <h1 class="m-0 text-dark">Informe de Stock</h1>
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
                        <!--<a class="btn btn-primary btn-sm" href="compra.php">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Informe de Compras
                        </a>-->
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

                        <div class="#">
                        
                            <div class="col-lg-12">
                                <canvas id="stock" width="400" height="170"></canvas>
                            </div>
                            <!--<div class="col-lg-6">
                                <canvas id="stockMinimo" width="400" height="400"></canvas>
                            </div>-->

                        </div>
                
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
graficoStock();
/*graficoStockMinimo();*/

function graficoStock(){
    $.ajax({
        url:'../../utils/informes/graficoProducto.php',
        type: 'POST'
    }).done(function(data){
        //var marca = [];
        var descripcion = [];
        var cantidadActual = [];
        var cantidadMinima = [];
        var colores = [];
        var datos = JSON.parse(data);
        for (var x=0; x < datos.length; x++){
            //marca.push(datos[x].marca._descripcion);
            descripcion.push(datos[x]._descripcion);
            cantidadActual.push(datos[x]._stockActual);
            cantidadMinima.push(datos[x]._stockMinimo);
            colores.push(colorRGB());
        }
    var ctx = document.getElementById('stock');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: descripcion,
            datasets: [{
                label: 'Stock Actual',
                data: cantidadActual,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            },
            {
                label: 'Stock Mínimo',
                data: cantidadMinima,
                backgroundColor: colores,
                borderColor: colores,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    })
}

function generarNumero(numero){
    return (Math.random()*numero).toFixed(0);
}

function colorRGB(){
    var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
    return "rgb" + coolor;
}
</script>
