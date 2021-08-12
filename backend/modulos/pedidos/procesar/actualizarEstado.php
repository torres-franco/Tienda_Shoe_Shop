<?php 

require_once "../../../class/Pedido.php";

$id = $_POST['txtIdPedido'];
$estado = $_POST['cboEstado'];

$pedido = Pedido::obtenerPorId($id);
$pedido->setIdPedidoEstado($estado);

$pedido->actualizar();

//highlight_string(var_export($pedido, true));

if ($estado == 2) {
	header("location: ../listado.php?mensaje=3");
} else if($estado == 3) {
	header("location: ../listado.php?mensaje=4");
} else {
	header("location: ../listado.php?mensaje=5");
}




?>