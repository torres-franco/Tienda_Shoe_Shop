<?php

require_once "../../../class/Marca.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$marca = Marca::obtenerPorId($id);
$marca->setDescripcion($descripcion);

$marca->actualizar();

header("location: ../listado.php");

?>