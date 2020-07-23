<?php

require_once '../../../class/Provincia.php';


$nombre = $_POST['txtNombre'];


/*if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "La razón social no debe estar vacia";
	header("location: ../alta.php");
	exit;
}*/



$provincia = new Provincia($nombre);

$provincia->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>