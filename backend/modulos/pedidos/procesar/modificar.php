<?php
require_once "../../../class/Pedido.php";
    

    $idPedido = $_POST['idPedido'];
	$fechaPedido = $_POST['fecha'];
	$cliente = $_POST['cliente'];
    //$metodoPago = $_POST['metodoPago'];
    $estadoPedido = $_POST['estado'];

	
    $pedido = Pedido::obtenerPorId($idPedido);
    $pedido->setFechaPedido($fechaPedido);
    $pedido->setIdCliente($cliente);
    //$pedido->setMetodoPago($metodoPago);
    $pedido->setIdPedidoEstado($estadoPedido);
    $pedido->actualizar();

    //var_dump($pedido);

    $detallePedido = new PedidoDetalle();

    $detallePedido->eliminar($pedido->getIdPedido());
    
   
    foreach($_POST['items'] as $item){
    	//echo var_dump($item);
        $detallePedido = new PedidoDetalle();
        $detallePedido->setIdProducto($item['id_producto']);
		$detallePedido->setIdPedido($pedido->getIdPedido());
		$detallePedido->setProducto();
		$detallePedido->setPrecio();
		$detallePedido->setCantidad($item['cantidad']);
		//$detallePedido->setIdEstadoPedido(1);
		$detallePedido->guardar();

    }


?>