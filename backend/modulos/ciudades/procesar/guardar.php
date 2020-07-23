<?php

require_once '../../../class/Ciudad.php';


$nombre = $_POST['txtNombre'];
$codigoPostal = $_POST['txtCodigoPostal'];


/*if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "La razón social no debe estar vacia";
	header("location: ../alta.php");
	exit;
}*/



$ciudad = new Ciudad($nombre, $codigoPostal);

$ciudad->guardar();

header("location: ../listado.php");

//highlight_string(var_export($barrio, true));

?>