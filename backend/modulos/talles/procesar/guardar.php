<?php

require_once '../../../class/Talle.php';


$descripcion = $_POST['txtDescripcion'];


/*if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "La razón social no debe estar vacia";
	header("location: ../alta.php");
	exit;
}*/



$talle = new Talle($descripcion);

$talle->guardar();

header("location: ../../productos/alta.php");

//highlight_string(var_export($barrio, true));

?>