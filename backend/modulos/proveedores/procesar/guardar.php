<?php

require_once "../../../class/Proveedor.php";

$razon_social = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];


if (empty(trim($razon_social))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$proveedor = new Proveedor ();
$proveedor->setRazonSocial($razon_social);
$proveedor->setCuit($cuit);

$proveedor->guardar();

header("location: ../listadoProveedor.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>