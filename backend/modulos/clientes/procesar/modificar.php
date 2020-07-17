<?php

session_start();

require_once "../../../class/Cliente.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['txtGenero'];


if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El nombre no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
} elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "el nombre debe contener al menos 3 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
}

if (empty(trim($apellido))) {
	$_SESSION['mensaje_error'] = "El apellido no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($apellido)) < 3) {
	$_SESSION['mensaje_error'] = "El apellido debe contener al menos 3 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
}

if (empty(trim($dni))) {
	$_SESSION['mensaje_error'] = "El DNI no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($apellido)) < 8) {
	$_SESSION['mensaje_error'] = "El DNI debe contener 8 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
}

if (empty(trim($genero))) {
	$_SESSION['mensaje_error'] = "El género no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php

$cliente = Cliente::obtenerPorId($id);
$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
$cliente->setDni($dni);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setGenero($genero);

$cliente->actualizar();

//highlight_string(var_export($cliente,true));

header("location: ../listado.php?mensaje=2");

?>

