<?php

require_once "../../../class/Talle.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$talle = Talle::obtenerPorId($id);
$talle->setDescripcion($descripcion);

$talle->actualizar();

header("location: ../listado.php");

?>