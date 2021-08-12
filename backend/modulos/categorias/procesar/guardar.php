<?php

session_start();

require_once '../../../class/Categoria.php';


$descripcion = $_POST['txtDescripcion'];
$comprobar = Categoria::comprobarExistenciaCategoria($descripcion);

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "La categoría debe contener al menos 2 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) > 20) {
	$_SESSION['mensaje_error'] = "La categoría no debe contener más de 20 caracteres";
	header("location: ../alta.php");
	exit;
} elseif (is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan números";
	header("location: ../alta.php");
	exit;
}



$categoria = new Categoria($descripcion);

$categoria->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($barrio, true));

?>