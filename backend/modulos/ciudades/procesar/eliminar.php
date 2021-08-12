<?php

require_once "../../../class/Ciudad.php";



$id = $_GET['id'];

$ciudad = Ciudad::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$ciudad->eliminar();

header("location: ../listado.php?mensaje=3");

?>