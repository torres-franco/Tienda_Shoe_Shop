<?php 

    require_once('../../class/EstadoPedido.php');

    $estado = new EstadoPedido();


    if($estado['estado']=="Aprovado"){
      echo "<bullet class=\"bullet-verde\"/>";
    }elseif($estado['estado']=="Terminando"){
      echo "<bullet class=\"bullet-amarillo\"/>";
     elseif($estado['estado']=="Ocupado"){
      echo "<bullet class=\"bullet-rojo\"/>";
    }
     elseif($estado['estado']=="Fuera de servicio"){
      echo "<bullet class=\"bullet-blanco\"/>";
    }
    //highlight_string(var_export($listadoProducto, true));
    
    print json_encode($listadoProducto);

?>