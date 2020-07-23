<?php

require_once "../../../class/Color.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$color = Color::obtenerPorId($id);
$color->setDescripcion($descripcion);

$color->actualizar();

header("location: ../listado.php");

?>