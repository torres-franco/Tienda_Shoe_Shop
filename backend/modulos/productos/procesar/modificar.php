<?php

require_once "../../../class/Producto.php";

$id = $_POST['txtId'];
$marca = $_POST['cboMarca'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];
$stockActual = $_POST['txtStockActual'];
$stockMinimo = $_POST['txtStockMinimo'];
$categoria = $_POST['cboCategoria'];
$color = $_POST['cboColor'];
$talle = $_POST['cboTalle'];

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php 

$producto = Producto::obtenerPorId($id);
$producto->setIdMarca($marca);
$producto->setDescripcion($descripcion);
$producto->setPrecio($precio);
$producto->setStockActual($stockActual);
$producto->setStockMinimo($stockMinimo);
$producto->setIdCategoria($categoria);
$producto->setIdColor($color);
$producto->setIdTalle($talle);

$producto->actualizar();

//highlight_string(var_export($producto, true));


header("location: ../listado.php");

?>