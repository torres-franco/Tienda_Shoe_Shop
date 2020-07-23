<?php

require_once '../../../class/Marca.php';


$descripcion = $_POST['txtDescripcion'];


/*if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "La razón social no debe estar vacia";
	header("location: ../alta.php");
	exit;
}*/



$marca = new Marca($descripcion);

$marca->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>