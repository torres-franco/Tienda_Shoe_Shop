<?php
require_once "../../../class/Compra.php";
    

    $idCompra = $_POST['idCompra'];
	$fechaCompra = $_POST['fecha'];
    $proveedor = $_POST['proveedor'];
    $estadoCompra = $_POST['estado'];
    $tipoPago = $_POST['tipoPago'];

	
    $compra = Compra::obtenerPorId($idCompra);
    $compra->setFechaCompra($fechaCompra);
    $compra->setIdProveedor($proveedor);
    $compra->setIdEstadoCompra($estadoCompra);
    $compra->setIdTipoPago($tipoPago);

    $compra->actualizar();

    //var_dump($pedido);

    $detalleCompra = new DetalleCompra();

    $detalleCompra->eliminar($compra->getIdCompra());
    
   
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