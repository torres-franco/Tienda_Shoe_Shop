<?php

require_once "../../../class/Provincia.php";



$id = $_GET['id'];

$provincia = Provincia::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$provincia->eliminar();

header("location: ../listado.php");

?>