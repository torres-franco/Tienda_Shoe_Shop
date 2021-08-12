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
                <h1 class="m-0 text-dark">Panel principal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right pt-1">
                    <li class="breadcrumb-item">

                      

                    </li>   
                </ol>
            </div><!-- /.col -->
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- total Ventas -->
            <?php 

            require_once '../../utils/informes/totalVenta.php';

            ?>

            <!--total ventas end -->
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- Total Compras -->
            <?php 

            require_once '../../utils/informes/totalCompra.php';

            ?>

            <!-- Total Compras end-->
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- Total Cliente -->
            <?php 

            require_once '../../utils/informes/totalCliente.php';

            ?>

            <!-- Total Cliente end -->
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- Producto más vendido -->
            <?php 

            require_once '../../utils/informes/productoUnicoMasVendido.php';

            ?>
            <!-- producto más vendido end -->
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        
                            <div class="col-lg-12">
                            <STRONG>TOTAL DE VENTAS POR MES EN EL AÑO</STRONG>
                                <canvas id="venta" width="450" height="140"></canvas>
                            </div>
                
                    </div>
                    
                </div>
            <!-- /.card -->
            </div>
            <div class="col-6">
                <div class="card">

                    <div class="card-header">
                        
                            <div class="col-lg-12">
                            <STRONG>TOP 5 DE LOS PRODUCTOS MÁS VENDIDOS EN EL AÑO</STRONG>
                                <canvas id="masVendido" width="250" height="140"></canvas>
                            </div>
                
                    </div>
                    
                </div>
            <!-- /.card -->
            </div>
            <div class="col-6">
                <div class="card">

                    <div class="card-header">
                        
                            <div class="col-lg-12">
                            <STRONG>TOTAL DE COMPRAS REALIZADAS POR MES EN EL AÑO</STRONG>
                                <canvas id="compra" width="250" height="140"></canvas>
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

graficoVentas();
productoMasVendido();
graficoCompras();
//filtroPorMes();

/*function filtroPorMes(){
  var fecha = new Date();
  var mes = fecha.getMonth() + 1;
  //alert(mes);
}*/

function graficoVentas(){
    $.ajax({
        url:'../../utils/informes/graficoVenta.php',
        type: 'POST'
    }).done(function(data){
        //var marca = [];
        var total = [];
        var mes = [];
        var colores = [];
        var datos = JSON.parse(data);

        console.log(datos);
        for (var x=0; x < datos.length; x++){
            //console.log(datos[x]);
            total.push(datos[x].total);
            //console.log(datos[x]._total);
            mes.push(datos[x].mes);
            colores.push(colorRGB());
        }
    var ctx = document.getElementById('venta');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: mes,
            datasets: [{
                label: 'Ventas',
                data: total,
                backgroundColor:colores,
                borderColor:colores,
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

function productoMasVendido(){
    $.ajax({
        url:'../../utils/informes/productoMasVendido.php',
        type: 'POST'
    }).done(function(data){
        //var marca = [];
        var producto = [];
        var cantidad = [];
        var colores = [];
        var datos = JSON.parse(data);

        console.log(datos);
        for (var x=0; x < datos.length; x++){
            //console.log(datos[x]);
            producto.push(datos[x].producto);
            //console.log(datos[x]._total);
            cantidad.push(datos[x].cantidad);
            colores.push(colorRGB());
        }
    var ctx = document.getElementById('masVendido');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: producto,
            datasets: [{
                label: 'Top 5 productos más vendidos',
                data: cantidad,
                backgroundColor:colores,
                borderColor:colores,
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

function graficoCompras(){
    $.ajax({
        url:'../../utils/informes/graficoCompras.php',
        type: 'POST'
    }).done(function(data){
        //var marca = [];
        var total = [];
        var mes = [];
        var colores = [];
        var datos = JSON.parse(data);

        console.log(datos);
        for (var x=0; x < datos.length; x++){
            //console.log(datos[x]);
            total.push(datos[x].total);
            //console.log(datos[x]._total);
            mes.push(datos[x].mes);
            colores.push(colorRGB());
        }
    var ctx = document.getElementById('compra');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: mes,
            datasets: [{
                label: 'Compras',
                data: total,
                backgroundColor:colores,
                borderColor:colores,
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
