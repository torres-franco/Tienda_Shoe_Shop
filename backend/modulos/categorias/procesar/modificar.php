<?php

require_once "../../../class/Categoria.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];

$categoria = Categoria::obtenerPorId($id);
$categoria->setDescripcion($descripcion);

$categoria->actualizar();

header("location: ../listado.php");

?>