<?php

session_start();

require_once "../../../class/Modulo.php";

$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];


if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "El campo módulo no debe estar vacio";
	header("location: ../alta.php");
	exit;
}




$modulo = new Modulo($descripcion, $directorio);

$modulo->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>