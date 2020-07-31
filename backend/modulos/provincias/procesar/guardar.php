<?php

session_start();

require_once '../../../class/Provincia.php';


$nombre = $_POST['txtNombre'];


if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "La provincia es un campo requerido";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($nombre)) < 2) {
	$_SESSION['mensaje_error'] = "Debe contener al menos 2 caractéres";
	header("location: ../alta.php");
	exit;
}


$provincia = new Provincia($nombre);

$provincia->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>