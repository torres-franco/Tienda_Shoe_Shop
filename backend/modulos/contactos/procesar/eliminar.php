<?php

require_once "../../../class/Contacto.php";



$id = $_GET['id'];

$contacto = Contacto::obtenerPorId($id);

$contacto->eliminar();

//highlight_string(var_export($contacto, true));


header("location: /proyecto_shoe_shop/backend/modulos/clientes/listado.php");

?>