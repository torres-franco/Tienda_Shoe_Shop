<?php

require_once "../../../class/Provincia.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];

$provincia = Provincia::obtenerPorId($id);
$provincia->setNombre($nombre);

$provincia->actualizar();

header("location: ../listado.php");

?>