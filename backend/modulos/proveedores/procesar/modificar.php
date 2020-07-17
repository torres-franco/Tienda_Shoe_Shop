<?php

session_start();

require_once "../../../class/Proveedor.php";

$id = $_POST['txtId'];
$razon_social = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];

if (empty(trim($razon_social))) {
	$_SESSION['mensaje_error'] = "Razón social no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($razon_social)) < 2) {
	$_SESSION['mensaje_error'] = "Razón social debe contener al menos 10 caracteres";
	header("location: ../actualizar.php?id=$id");
	exit;
}

if (empty(trim($cuit))) {
	$_SESSION['mensaje_error'] = "El CUIT no debe estar vacio";
	header("location: ../actualizar.php?id=$id");
	exit;
}elseif (strlen(trim($cuit)) < 9) {
	$_SESSION['mensaje_error'] = "El CUIT debe contener al menos 10 caracteres";
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

$proveedor = Proveedor::obtenerPorId($id);
$proveedor->setRazonSocial($razon_social);
$proveedor->setCuit($cuit);

$proveedor->actualizar();

//highlight_string(var_export($proveedor,true));

header("location: ../listado.php?mensaje=2");

?>

