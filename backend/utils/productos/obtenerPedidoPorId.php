<?php 

    require_once('../../class/Pedido.php');

    //$pedidoDetalle = new PedidoDetalle($idPedidoDetalle);


    
	$pedido = Pedido::obtenerPorId($_GET['idPedido']);

    
    //highlight_string(var_export($pedido, true));
    
    echo json_encode($pedido);

?>