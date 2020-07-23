<?php

require_once "../../../class/Categoria.php";



$id = $_GET['id'];

$categoria = Categoria::obtenerPorId($id);

//highlight_string(var_export($modulo,true));
//exit;

$categoria->eliminar();

header("location: ../listado.php");

?>