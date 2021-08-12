<?php

require_once "../../../class/Color.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../alta.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) < 3) {
	$_SESSION['mensaje_error'] = "El color debe contener al menos 3 caracteres";
	header("location: ../alta.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) > 15) {
	$_SESSION['mensaje_error'] = "El color no debe contener más de 15 caracteres";
	header("location: ../alta.php?id=$id");
	exit;
} elseif (is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan números";
	header("location: ../alta.php?id=$id");
	exit;
}

$color = Color::obtenerPorId($id);
$color->setDescripcion($descripcion);

$color->actualizar();

header("location: ../listado.php?mensaje=2");

?>