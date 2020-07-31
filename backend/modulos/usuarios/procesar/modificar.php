<?php

require_once "../../../class/Usuario.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$user = $_POST['txtUser'];


if (empty(trim($nombre))) {
	$_SESSION['mensaje_error'] = "El apellido no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($nombre)) < 3) {
	$_SESSION['mensaje_error'] = "El apellido debe contener al menos 3 caracteres";
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


if (empty(trim($user))) {
	$_SESSION['mensaje_error'] = "El usuario no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($user)) < 6) {
	$_SESSION['mensaje_error'] = "El usuario debe contener al menos 6 caracteres";
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

$usuario = Usuario::obtenerPorId($id);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setUser($user);

$usuario->actualizar();

header("location: ../listado.php?mensaje=2");

?>
