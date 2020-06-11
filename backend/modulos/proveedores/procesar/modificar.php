<?php

require_once "../../../class/Proveedor.php";

$id = $_POST['txtId'];
$razon_social = $_POST['txtRazonSocial'];
$cuit = $_POST['txtCuit'];

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

header("location: ../listadoProveedor.php?mensaje=2");

?>

