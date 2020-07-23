<?php

require_once "../../../class/Barrio.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$barrio = Barrio::obtenerPorId($id);
$barrio->setDescripcion($descripcion);

$barrio->actualizar();

header("location: ../listado.php");

?>