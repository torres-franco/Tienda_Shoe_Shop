<?php

require_once "../../../class/Modulo.php";



$id = $_GET['id'];

$modulo = Modulo::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$modulo->eliminar();

header("location: ../listado.php");

?>