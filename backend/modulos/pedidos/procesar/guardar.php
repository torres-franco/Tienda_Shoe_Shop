<?php
require_once "../../../class/Pedido.php";

	$fechaPedido = $_POST['fecha'];
	$cliente = $_POST['cliente'];
    //$metodoPago = $_POST['metodoPago'];
    $estadoPedido = $_POST['estado'];

	
    $pedido = new Pedido(); // guardamos la cabecera
    $pedido->setFechaPedido($fechaPedido);
    $pedido->setIdCliente($cliente);
    //$pedido->setMetodoPago($metodoPago);
    $pedido->setIdPedidoEstado($estadoPedido); //agregar en el construct
    $pedido->guardar();

    var_dump($pedido);  
    
   //$detallePedido = new PedidoDetalle($item['id_producto']); // guardamos los detalles
   
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