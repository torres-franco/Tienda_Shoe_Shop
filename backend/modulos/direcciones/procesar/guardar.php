<?php

require_once "../../../class/Direccion.php";

$idPersona = $_POST['txtIdPersona'];
$idCliente = $_POST['txtIdCliente'];
$barrio = $_POST['cboBarrio'];
$modulo = $_POST['txtModulo'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$piso = $_POST['txtPiso'];
$manzana = $_POST['txtManzana'];


$provincia = $_POST['cboProvincia'];


$direccion = new Direccion();
$direccion->setIdBarrio($barrio);
$direccion->setCalle($calle);
$direccion->setAltura($altura);
$direccion->setPiso($piso);
$direccion->setManzana($manzana);
$direccion->setIdPersona($idPersona);

$direccion->guardar();

header("location: /proyecto_shoe_shop/backend/modulos/$modulo/detalle.php?id=$idCliente");

//highlight_string(var_export($direccion, true));



?>