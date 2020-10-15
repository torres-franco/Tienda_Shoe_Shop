<?php

require_once "../../../class/Perfil.php";



$idPerfil = $_GET['id'];

$perfil = Perfil::obtenerPorId($idPerfil);

//highlight_string(var_export($modulo,true));
//exit;

$perfil->eliminar();

header("location: ../listado.php?mensaje=3");

?>