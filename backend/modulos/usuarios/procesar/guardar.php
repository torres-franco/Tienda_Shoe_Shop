<?php

session_start();

require_once "../../../class/Usuario.php";
require_once "../../../config.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$perfil = $_POST['cboPerfil'];
$user = $_POST['txtUser'];
$clave = $_POST['txtClave'];
$imagen = $_FILES['fileImagen'];


$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);


$fechaHora = date("dmYHis");

$nombreImagen = $fechaHora . "_" .$imagen['name'];

$rutaImagen = DIR_IMAGENES . $nombreImagen;

move_uploaded_file($imagen['tmp_name'], $rutaImagen);


//highlight_string(var_export($imagen, true));
//exit;



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
$usuario->setIdPerfil($perfil);
$usuario->setUser($user);
$usuario->setClave($clave);
$usuario->setImagen($nombreImagen);

$usuario->guardar();


header("location: ../listado.php?mensaje=1");

//highlight_string(var_export($usuario, true));
//exit;



?>
