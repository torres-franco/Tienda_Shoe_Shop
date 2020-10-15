<?php

require_once '../../../class/Perfil.php';
require_once '../../../class/PerfilModulo.php';

$idPerfil = $_POST['txtIdPerfil'];
$descripcion = $_POST['txtDescripcion'];
$listaModulos = $_POST['cboModulos'];



$perfil = Perfil::obtenerPorId($idPerfil);
$perfil->setDescripcion($descripcion);

$perfil->actualizar();

$perfil->eliminarModulos();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

header("location: ../listado.php?mensaje=2");

?>