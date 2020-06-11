<?php

require_once "../../../class/Empleado.php";

$id = $_POST['txtId'];
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

$empleado = Empleado::obtenerPorId($id);
$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setIdTipoDocumento($tipoDocumento);
$empleado->setNumeroDocumento($numeroDocumento);
$empleado->setNumeroLegajo($numeroLegajo);

$empleado->actualizar();

header("location: ../listadoEmpleado.php?mensaje=2");

?>
