<?php

session_start();

require_once '../../../class/Marca.php';


$descripcion = $_POST['txtDescripcion'];
$comprobar = Marca::comprobarExistenciaMarca($descripcion);

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "La marca debe contener al menos 2 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) > 20) {
	$_SESSION['mensaje_error'] = "La marca no debe contener más de 20 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan números";
	header("location: ../alta.php");
	exit;
}


$marca = new Marca($descripcion);

$marca->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($barrio, true));

?>