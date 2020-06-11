<?php

require_once "../../../class/Usuario.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$user = $_POST['txtUser'];


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

$usuario = Usuario::obtenerPorId($id);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setDni($dni);
$usuario->setUser($user);

$usuario->actualizar();

header("location: ../listadoUsuario.php?mensaje=2");

?>

