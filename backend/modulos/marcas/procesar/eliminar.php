<?php

require_once "../../../class/Marca.php";



$id = $_GET['id'];

$marca = Marca::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$marca->eliminar();

header("location: ../listado.php");

?>