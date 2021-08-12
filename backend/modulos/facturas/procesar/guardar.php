<?php

session_start();

require_once "../../../class/Factura.php";
require_once "../../../class/Pedido.php";
require_once "../../../class/Producto.php";

	$numero = $_POST['txtNumero'];
	$fechaEmision = $_POST['txtFechaEmision'];
    $tipoFactura = $_POST['cboTipoFactura'];
    $idTipoPago = $_POST['cboTipoPago'];
    $idPedido = $_POST['txtIdPedido'];

	
    $factura = new Factura(); // guardamos la cabecera
    $factura->setNumero($numero);
    $factura->setFechaEmision($fechaEmision);
    $factura->setTipo($tipoFactura);
    $factura->setIdTipoPago($idTipoPago);
    $factura->setIdPedido($idPedido);

    $pedido = Pedido::obtenerPorId($idPedido);

    $pedido->setIdPedidoEstado(4);

    $pedido->actualizar();


    $factura->guardar();

    $producto = Producto::obtenerPorIdPedido($idPedido);

    $producto->descontarStock($idPedido);

    header("location: ../listado.php?mensaje=1");

    //highlight_string(var_export($producto, true));

?>