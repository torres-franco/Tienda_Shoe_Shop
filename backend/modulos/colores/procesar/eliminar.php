<?php

require_once "../../../class/Color.php";



$id = $_GET['id'];

$color = Color::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$color->eliminar();

header("location: ../listado.php");

?>