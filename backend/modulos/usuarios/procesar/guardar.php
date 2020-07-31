<?php

session_start();

require_once "../../../class/Usuario.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
/*$dni = $_POST['txtDni'];*/
$user = $_POST['txtUser'];
$clave = $_POST['txtClave'];



if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El apellido no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El apellido debe contener al menos 3 caracteres";
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

/*if (empty(trim($dni))) {
	$_SESSION['mensaje_error'] = "El DNI no debe estar vacio";
	header("location: ../alta.php");
	exit;
}*/

if (empty(trim($user))) {
	$_SESSION['mensaje_error'] = "El usuario no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($user)) < 6) {
	$_SESSION['mensaje_error'] = "El usuario debe contener al menos 6 caracteres";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($clave))) {
	$_SESSION['mensaje_error'] = "La clave no debe estar vacia";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($clave)) < 7) {
	$_SESSION['mensaje_error'] = "La clave debe contener al menos 7 caracteres";
	header("location: ../alta.php");
	exit;
}

$usuario = new Usuario($nombre, $apellido);
$usuario->setUser($user);
$usuario->setClave($clave);

$usuario->guardar();

header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>