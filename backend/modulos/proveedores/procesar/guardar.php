<?php

session_start();

require_once "../../../class/Proveedor.php";

$razon_social = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];


if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "Razón social no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($razon_social)) < 2) {
	$_SESSION['mensaje_error'] = "Razón social debe contener al menos 10 caracteres";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($cuit))) {
	$_SESSION['mensaje_error'] = "El CUIT no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($cuit)) < 9) {
	$_SESSION['mensaje_error'] = "El CUIT debe contener al menos 10 caracteres";
	header("location: ../alta.php");
	exit;
}



$proveedor = new Proveedor ();
$proveedor->setRazonSocial($razon_social);
$proveedor->setCuit($cuit);

$proveedor->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>