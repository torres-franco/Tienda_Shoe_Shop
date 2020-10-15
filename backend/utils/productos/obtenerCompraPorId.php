<?php 

    require_once('../../class/Compra.php');

    //$pedidoDetalle = new PedidoDetalle($idPedidoDetalle);


    
	$compra = Compra::obtenerPorId($_GET['idCompra']);

    
    //highlight_string(var_export($pedido, true));
    
    echo json_encode($compra);

?>