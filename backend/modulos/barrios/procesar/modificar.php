<?php

require_once "../../../class/Barrio.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];
$idCiudad = $_POST['cboCiudad'];

$barrio = Barrio::obtenerPorId($id);
$barrio->setDescripcion($descripcion);
$barrio->setIdCiudad($idCiudad);

$barrio->actualizar();

header("location: ../listado.php?mensaje=2");

?>