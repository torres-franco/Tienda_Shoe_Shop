<?php

require_once "../../../class/Talle.php";



$id = $_GET['id'];

$talle = Talle::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$talle->eliminar();

header("location: ../listado.php?mensaje=3");

?>