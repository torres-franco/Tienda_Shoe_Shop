<?php
require_once "../../../class/Compra.php";

	$fechaCompra = $_POST['fecha'];
	$proveedor = $_POST['proveedor'];
    $estadoCompra = $_POST['estado'];
    $tipoPago = $_POST['tipoPago'];

	
    $compra = new Compra(); // guardamos la cabecera
    $compra->setFechaCompra($fechaCompra);
    $compra->setIdProveedor($proveedor);
    $compra->setIdEstadoCompra($estadoCompra);
    $compra->setIdTipoPago($tipoPago);
    $compra->guardar();

    var_dump($compra);  
    
   //$detallePedido = new PedidoDetalle($item['id_producto']); // guardamos los detalles
   
    foreach($_POST['items'] as $item){
    	//echo var_dump($item);
        $detalleCompra = new DetalleCompra();
        $detalleCompra->setIdProducto($item['id_producto']);
		$detalleCompra->setIdCompra($compra->getIdCompra());
		$detalleCompra->setProducto();
		$detalleCompra->setPrecio();
		$detalleCompra->setCantidad($item['cantidad']);
		//$detallePedido->setIdEstadoPedido(1);
		$detalleCompra->guardar();

    }


?>