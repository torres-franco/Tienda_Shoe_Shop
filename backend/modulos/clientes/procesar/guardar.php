<?php

session_start();

require_once "../../../class/Cliente.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['txtGenero'];


if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre no debe estar vacio";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "El apellido no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "El apellido debe contener al menos 3 caracteres";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($dni))) {
	$_SESSION['mensaje_error'] = "El DNI no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($apellido)) < 8) {
	$_SESSION['mensaje_error'] = "El DNI debe contener 8 caracteres";
	header("location: ../alta.php");
	exit;
}

//if ((int) $sexo == 0) {
	//$_SESSION['mensaje_error'] = "debe seleccionar el sexo";
	//header("location: formulario.php");
	//exit;
//}

if (empty(trim($genero))) {
	$_SESSION['mensaje_error'] = "El género no debe estar vacio";
	header("location: ../alta.php");
	exit;
}


$cliente = new Cliente($nombre, $apellido);
$cliente->setDni($dni);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setGenero($genero);

$cliente->guardar();


header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>