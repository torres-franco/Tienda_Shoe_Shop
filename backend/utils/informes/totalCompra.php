<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Compra.php');



    $sql = "SELECT SUM(dc.cantidad * dc.precio) as total FROM compra INNER JOIN detallecompra as dc ON dc.id_compra = compra.id_compra";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();


    
    //print json_encode($listaFactura);
    //highlight_string(var_export($listadoFactura, true));
    //exit;
    
    //print json_encode($listaFactura);

?>

            <div class="small-box bg-success">
              <div class="inner">
                <?php while ($row = $datos->fetch_assoc()): ?>
                  <h3>$<?php echo $row['total']; ?></h3>
                <?php endwhile  ?>

                <p>Total Compras en el año</p>
              </div>
              <div class="icon">
                <i class="fas fa-cart-arrow-down"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
        