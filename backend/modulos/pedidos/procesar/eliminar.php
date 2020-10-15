<?php

require_once "../../../class/PedidoDetalle.php";



$idPedidoDetalle = $_GET['id'];

$pedidoDetalle = PedidoDetalle::obtenerPorId($idPedidoDetalle);

//highlight_string(var_export($modulo,true));
//exit;

$pedidoDetalle->eliminar();


?>