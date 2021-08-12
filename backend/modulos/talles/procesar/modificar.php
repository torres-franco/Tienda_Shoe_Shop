<?php

require_once "../../../class/Talle.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) > 2) {
	$_SESSION['mensaje_error'] = "La marca no debe contener más de 2 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (!is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan letras";
	header("location: ../actualizar.php?id=$id");
	exit;
}

$talle = Talle::obtenerPorId($id);
$talle->setDescripcion($descripcion);

$talle->actualizar();

header("location: ../listado.php?mensaje=2");

?>