<?php

require_once "../../../class/Ciudad.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$codigoPostal = $_POST['txtCodigoPostal'];

$ciudad = Ciudad::obtenerPorId($id);
$ciudad->setNombre($nombre);
$ciudad->setCodigoPostal($codigoPostal);

$ciudad->actualizar();

header("location: ../listado.php");

?>