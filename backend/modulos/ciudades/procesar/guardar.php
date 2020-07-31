<?php

session_start();

require_once '../../../class/Ciudad.php';


$nombre = $_POST['txtNombre'];
$codigoPostal = $_POST['txtCodigoPostal'];


if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "La ciudad es un campo requerido";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($nombre)) < 2) {
	$_SESSION['mensaje_error'] = "Debe contener al menos 2 caractéres";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($codigoPostal))) {
	$_SESSION['mensaje_error'] = "El código postal es un campo requerido";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($codigoPostal)) < 2) {
	$_SESSION['mensaje_error'] = "El código postal debe contener al menos 2 caractéres";
	header("location: ../alta.php");
	exit;
}



$ciudad = new Ciudad($nombre, $codigoPostal);

$ciudad->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>