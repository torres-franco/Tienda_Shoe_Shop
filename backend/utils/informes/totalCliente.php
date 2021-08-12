<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Cliente.php');



    $sql = "SELECT COUNT(id_cliente) as TotalCliente FROM cliente";

    $mysql = new MySQL();
    $datos = $mysql->consultar($sql);
    $mysql->desconectar();


?>	

	<div class="small-box bg-warning">
      <div class="inner">
        <?php while ($row = $datos->fetch_assoc()): ?>
          <h3><?php echo $row['TotalCliente']; ?></h3>
        <?php endwhile  ?>

        <p>Clientes registrados</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    </div>