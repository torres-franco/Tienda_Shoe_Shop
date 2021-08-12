<?php 

require_once "../../../class/Compra.php";
require_once "../../../class/Producto.php";

$idCompra = $_POST['txtIdCompra'];
$estado = $_POST['cboEstado'];

$compra = Compra::obtenerPorId($idCompra);
$compra->setIdEstadoCompra($estado);

$compra->actualizar();

if ($estado == 2) {
	
	$producto = Producto::obtenerPorIdCompra($idCompra);

	$producto->aumentarStock($idCompra);

	header("location: ../listado.php?mensaje=3");

} else {

	header("location: ../listado.php?mensaje=4");
}

//highlight_string(var_export($pedido, true));




?>