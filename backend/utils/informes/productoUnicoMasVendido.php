<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Producto.php');



    $sql = "SELECT pro.descripcion as producto, SUM(dp.cantidad) AS cantidad FROM factura INNER JOIN pedidodetalle AS dp ON dp.id_pedido = factura.id_pedido INNER JOIN producto AS pro ON pro.id_producto = dp.id_producto INNER JOIN categoria as c ON pro.id_categoria = c.id_categoria INNER JOIN marca as m ON pro.id_marca = m.id_marca GROUP BY pro.descripcion ORDER BY cantidad DESC LIMIT 1";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();


?>  


    <div class="small-box bg-danger">
      <div class="inner">
          <?php while ($row = $datos->fetch_assoc()): ?>
            <h3><?php echo $row['producto']; ?></h3>
          <?php endwhile  ?>

        <p>El producto N°1 más vendido</p>
      </div>
      <div class="icon">
        <i class="fas fa-shopping-bag"></i>
      </div>
      <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    </div>