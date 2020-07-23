<?php

require_once "../../../class/Barrio.php";



$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$barrio->eliminar();

header("location: ../listado.php");

?>