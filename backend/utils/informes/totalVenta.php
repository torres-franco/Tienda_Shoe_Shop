<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Factura.php');



    $sql = "SELECT SUM(dp.cantidad * dp.precio) as total FROM factura INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();


    
    //print json_encode($listaFactura);
    //highlight_string(var_export($listadoFactura, true));
    //exit;
    
    //print json_encode($listaFactura);

?>


    <div class="small-box bg-info">
      <div class="inner">
        <?php while ($row = $datos->fetch_assoc()): ?>
            <h3>$<?php echo $row['total']; ?></h3>
        <?php endwhile  ?>
        

        <p>Total de Ventas en el año</p>
      </div>
      <div class="icon">
        <i class="fas fa-cart-plus"></i>
      </div>
      <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    </div>
          
      