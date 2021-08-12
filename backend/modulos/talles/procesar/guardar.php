<?php

session_start();

require_once '../../../class/Talle.php';


$descripcion = $_POST['txtDescripcion'];
$comprobar = Talle::comprobarExistenciaTalle($descripcion);

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) > 2) {
	$_SESSION['mensaje_error'] = "La marca no debe contener más de 2 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (!is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan letras";
	header("location: ../alta.php");
	exit;
}


$talle = new Talle($descripcion);

$talle->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($barrio, true));

?>