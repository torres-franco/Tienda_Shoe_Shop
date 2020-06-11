<?php

require_once "../../../class/Usuario.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$user = $_POST['txtUser'];
$clave = $_POST['txtClave'];



if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$usuario = new Usuario($nombre, $apellido);
$usuario->setDni($dni);
$usuario->setUser($user);
$usuario->setClave($clave);

$usuario->guardar();

header("location: ../listadoUsuario.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>