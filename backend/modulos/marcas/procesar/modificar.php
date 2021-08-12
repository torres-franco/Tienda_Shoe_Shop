<?php

session_start();

require_once "../../../class/Marca.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "La descripción no debe estar vacía.";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "La marca debe contener al menos 2 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (strlen(trim($descripcion)) > 20) {
	$_SESSION['mensaje_error'] = "La marca no debe contener más de 20 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (is_numeric($descripcion)){
	$_SESSION['mensaje_error'] = "No se aceptan números";
	header("location: ../actualizar.php?id=$id");
	exit;
}

$marca = Marca::obtenerPorId($id);
$marca->setDescripcion($descripcion);

$marca->actualizar();

header("location: ../listado.php?mensaje=2");

?>