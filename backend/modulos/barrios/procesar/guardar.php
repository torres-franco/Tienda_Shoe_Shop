<?php

require_once '../../../class/Barrio.php';


$descripcion = $_POST['txtDescripcion'];


/*if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "La razón social no debe estar vacia";
	header("location: ../alta.php");
	exit;
}*/



$barrio = new Barrio($descripcion);

$barrio->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>