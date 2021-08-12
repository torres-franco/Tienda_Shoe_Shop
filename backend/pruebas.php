<?php

require_once "class/PedidoDetalle.php";
require_once "class/Pedido.php";
require_once "class/Usuario.php";




foreach ($usuario->perfil->getModulos() as $modulo) {
	echo $modulo;  
}         
              

$detallePedido = new PedidoDetalle(2, 10000);
$detallePedido->setIdProducto(1);
$detallePedido->setIdPedido(3);

$detallePedido->guardar();

$pedido = new Pedido();
$pedido->setIdCliente(14);
$pedido->setIdPedidoEstado(1);
$pedido->setFecha('2020/09/24');

$pedido->guardar();



highlight_string(var_export($detallePedido, true));



?>