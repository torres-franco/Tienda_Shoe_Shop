<?php

session_start();

require_once "../../../class/Factura.php";
require_once "../../../class/NotaCredito.php";
require_once "../../../class/Pedido.php";
require_once "../../../class/Motivo.php";

	$fecha = $_POST['txtFecha'];
    $idMotivo = $_POST['cboMotivo'];
	$observacion = $_POST['txtObservacion'];
    $idFactura = $_POST['txtIdFactura'];
    $idPedido = $_POST['txtIdPedido'];

	
    $notaCredito = new NotaCredito(); // guardamos la cabecera
    $notaCredito->setFecha($fecha);
    $notaCredito->setIdMotivo($idMotivo);
    $notaCredito->setObservacion($observacion);
    $notaCredito->setIdFactura($idFactura);

    if ($notaCredito->setObservacion($observacion) == '') {
        $notaCredito->setObservacion('Ninguna');
    }

    /*if($idMotivo != 4 ) {
        $producto = Producto::obtenerPorIdFactura($idFactura);
        $producto->aumentarStock($idFactura);
    }*/


    $pedido = Pedido::obtenerPorId($idPedido);

    $pedido->setIdPedidoEstado(5);

    $pedido->actualizar();


    $notaCredito->guardar();

    //$producto = Producto::obtenerPorIdPedido($idPedido);

    //$producto->descontarStock($idPedido);

    header("location: ../listado.php?mensaje=1");

    //highlight_string(var_export($notaCredito, true));

?>