<?php

session_start();

require_once "../../../class/Producto.php";
require_once "../../../config.php";
require_once "../../../class/Imagen.php";


$marca = $_POST['cboMarca'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['txtPrecio'];
$stockActual = $_POST['txtStockActual'];
$stockMinimo = $_POST['txtStockMinimo'];
$categoria = $_POST['cboCategoria'];
$color = $_POST['cboColor'];
$talle = $_POST['cboTalle'];


$imagen = $_FILES['fileImagen'];


$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);


$fechaHora = date("dmYHis");

$nombreImagen = $fechaHora . "_" .$imagen['name'];

$rutaImagen = DIR_IMAGENES_PRODUCTOS . $nombreImagen;

move_uploaded_file($imagen['tmp_name'], $rutaImagen);


if (empty(trim($marca))) {
	$_SESSION['mensaje_error'] = "El campo marca no debe estar vacio";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "El campo descripción no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "El apellido debe contener al menos 2 caracteres";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($precio)) > 10) {
	$_SESSION['mensaje_error'] = "El precio no debe contener más de 10 dígitos";
	header("location: ../alta.php");
	exit;
}


if (empty(trim($precio))) {
	$_SESSION['mensaje_error'] = "El campo precio no debe estar vacio";
	header("location: ../alta.php");
	exit;
}elseif (strlen(trim($precio)) < 3) {
	$_SESSION['mensaje_error'] = "El precio debe contener al menos 3 dígitos";
	header("location: ../alta.php");
	exit;
}


if (empty(trim($stockActual))) {
	$_SESSION['mensaje_error'] = "El campo stock actual no debe estar vacio";
	header("location: ../alta.php");
	exit;
}


if (empty(trim($stockMinimo))) {
	$_SESSION['mensaje_error'] = "El campo stock minimo no debe estar vacio";
	header("location: ../alta.php");
	exit;
}


if (empty(trim($categoria))) {
	$_SESSION['mensaje_error'] = "El campo categoria no debe estar vacio";
	header("location: ../alta.php");
	exit;
}


if (empty(trim($color))) {
	$_SESSION['mensaje_error'] = "El campo color no debe estar vacio";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($talle))) {
	$_SESSION['mensaje_error'] = "El campo talle no debe estar vacio";
	header("location: ../alta.php");
	exit;
}


$producto = new Producto ();
$producto->setIdMarca($marca);
$producto->setDescripcion($descripcion);
$producto->setPrecio($precio);
$producto->setStockActual($stockActual);
$producto->setStockMinimo($stockMinimo);
$producto->setIdCategoria($categoria);
$producto->setIdColor($color);
$producto->setIdTalle($talle);
$producto->setArrImagen($imagen);

$producto->guardar();

$imagen = new Imagen($nombreImagen);
$imagen->setIdProducto($producto->getIdProducto());

$imagen->guardar();

//highlight_string(var_export($producto, true));

header("location: ../listado.php?mensaje=1");
//highlight_string(var_export($producto,true));

//echo "producto guardado";