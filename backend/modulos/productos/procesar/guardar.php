<?php

require_once "../../../class/Producto.php";

$marca = $_POST['cboMarca'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];
$stockActual = $_POST['txtStockActual'];
$stockMinimo = $_POST['txtStockMinimo'];
$categoria = $_POST['cboCategoria'];
$color = $_POST['cboColor'];
$talle = $_POST['cboTalle'];


/*if (empty(trim($descripcion))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}*/


$producto = new Producto ();
$producto->setIdMarca($marca);
$producto->setDescripcion($descripcion);
$producto->setPrecio($precio);
$producto->setStockActual($stockActual);
$producto->setStockMinimo($stockMinimo);
$producto->setIdCategoria($categoria);
$producto->setIdColor($color);
$producto->setIdTalle($talle);

$producto->guardar();

//highlight_string(var_export($producto,true));

//echo "producto guardado";

header("location: ../listado.php");