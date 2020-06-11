<?php

require_once "../../../class/Direccion.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$genero = $_POST['txtGenero'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
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

header("location: ../listadoDireccion.php");

?>

