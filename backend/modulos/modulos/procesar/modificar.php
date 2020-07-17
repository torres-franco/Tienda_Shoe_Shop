<?php

session_start();

require_once "../../../class/Modulo.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];



$modulo = Modulo::obtenerPorId($id);
$modulo->setDescripcion($descripcion);
$modulo->setDirectorio($directorio);

$modulo->actualizar();

//highlight_string(var_export($modulo,true));

header("location: ../listado.php?mensaje=2");

?>
