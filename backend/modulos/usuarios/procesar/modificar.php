<?php

require_once "../../../class/Usuario.php";
require_once "../../../config.php";


$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$user = $_POST['txtUser'];
$perfil = $_POST['cboPerfil'];
$imagen = $_FILES['fileImagen'];

$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);


$fechaHora = date("dmYHis");

$nombreImagen = $fechaHora . "_" .$imagen['name'];

$rutaImagen = DIR_IMAGENES . $nombreImagen;

move_uploaded_file($imagen['tmp_name'], $rutaImagen);


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
}elseif (strlen(trim($user)) < 3) {
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

$usuarioDetalle = Usuario::obtenerPorId($id);
$usuarioDetalle->setNombre($nombre);
$usuarioDetalle->setApellido($apellido);
$usuarioDetalle->setUser($user);
$usuarioDetalle->setIdPerfil($perfil);
$usuarioDetalle->setImagen($nombreImagen);

$usuarioDetalle->actualizar();

//highlight_string(var_export($usuarioDetalle, true));

header("location: ../listado.php?mensaje=2");

?>
