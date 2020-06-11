<?php

require_once "../../../class/Cliente.php";

?>


<?php

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

$cliente->eliminar();

header("location: ../listadoCliente.php?mensaje=3");

?>
