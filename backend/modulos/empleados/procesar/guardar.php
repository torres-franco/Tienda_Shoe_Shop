<?php

require_once "../../../class/Empleado.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$numeroLegajo = $_POST['txtNumeroLegajo'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}

?>


<?php
$empleado = new Empleado($nombre, $apellido);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setIdTipoDocumento($tipoDocumento);
$empleado->setNumeroDocumento($numeroDocumento);
$empleado->setNumeroLegajo($numeroLegajo);

$empleado->guardar();

header("location: ../listadoEmpleado.php?mensaje=1");
?>
