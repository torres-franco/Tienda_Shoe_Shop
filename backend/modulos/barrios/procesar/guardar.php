<?php

session_start();

require_once '../../../class/Barrio.php';


$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "El barrio no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "El barrio debe contener al menos 2 caracteres";
	header("location: ../alta.php");
	exit;
}



$barrio = new Barrio($descripcion);

$barrio->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>