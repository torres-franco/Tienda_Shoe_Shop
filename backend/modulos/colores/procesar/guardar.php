<?php

session_start();

require_once '../../../class/Color.php';


$descripcion = $_POST['txtDescripcion'];
$comprobar = Color::comprobarExistenciaColor($descripcion);


if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "el color debe contener al menos 3 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) > 15) {
	$_SESSION['mensaje_error'] = "el color no debe contener más de 15 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan números";
	header("location: ../alta.php");
	exit;
}



$color = new Color($descripcion);

$color->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($barrio, true));

?>