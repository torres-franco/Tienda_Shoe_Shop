<?php

require_once "../../../class/Direccion.php";
require_once "../../../class/Ciudad.php";

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];
$idDireccion = $_POST['txtIdDireccion'];
$barrio = $_POST['cboBarrio'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$piso = $_POST['txtPiso'];
$manzana = $_POST['txtManzana'];
$idCiudad = $_POST['cboCiudad'];
$idProvincia = $_POST['cboProvincia'];

//highlight_string(var_export($idProvincia, true));
//exit;


if (empty(trim($calle))) {
	echo "ERROR, EL CAMPO CALLE ESTÁ VACIO";
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php

$direccion = Direccion::obtenerPorIdPersona($idPersona);
$direccion->setIdBarrio($barrio);
$direccion->setCalle($calle);
$direccion->setAltura($altura);
$direccion->setPiso($piso);
$direccion->setManzana($manzana);

$direccion->actualizar($idDireccion);

//$barrio = Ciudad::obtenerPorIdBarrio($barrio);
//$barrio->setIdCiudad($idCiudad);

//$barrio->actualizar();

//highlight_string(var_export($direccion, true));
//exit;

header("location: /proyecto_shoe_shop/backend/modulos/$modulo/detalle.php?id=$idLlamada");

?>

