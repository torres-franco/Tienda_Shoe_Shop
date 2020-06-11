<?php

require_once "../../../class/Direccion.php";

$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$manzana = $_POST['txtManzana'];
$torre = $_POST['txtTorre'];
$piso = $_POST['txtPiso'];
$numeroPuerta = $_POST['txtNumeroPuerta'];
$sector = $_POST['sector'];
$referencia = $_POST['referencia'];


if (empty(trim($calle))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$direccion = new Direccion ();
$direccion->setCalle($calle);
$direccion->setAltura($altura);
$direccion->setTorre($torre);
$direccion->setPiso($piso);
$direccion->setNumeroPuerta($numeroPuerta);
$direccion->setSector($sector);
$direccion->setReferencia($referencia);

$direccion->guardar();

header("location: ../listadoDireccion.php");

//highlight_string(var_export($cliente, true));



?>