<?php

require_once "../../../class/Empleado.php";

?>


<?php

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

$empleado->eliminar();

header("location: ../listadoEmpleado.php?mensaje=3");

?>
