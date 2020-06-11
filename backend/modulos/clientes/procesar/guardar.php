<?php

require_once "../../../class/Cliente.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['txtGenero'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


$cliente = new Cliente($nombre, $apellido);
$cliente->setDni($dni);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setGenero($genero);

$cliente->guardar();

header("location: ../listadoCliente.php?mensaje=1");

//highlight_string(var_export($cliente, true));



?>