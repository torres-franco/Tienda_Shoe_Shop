<?php

session_start();

require_once '../../../class/Perfil.php';
require_once '../../../class/PerfilModulo.php';


$descripcion = $_POST['txtDescripcion'];
$comprobar = Perfil::comprobarExistenciaPerfil($descripcion);
$listaModulos = $_POST['cboModulos'];

if (empty(trim($descripcion))) {
	$_SESSION['mensaje_error'] = "El campo perfil no debe estar vacio";
	header("location: ../alta.php");
	exit;
} elseif (strlen(trim($descripcion)) < 2) {
	$_SESSION['mensaje_error'] = "El campo perfil debe contener al menos 2 caracteres";
	header("location: ../alta.php");
	exit;
}


$perfil = new Perfil($descripcion);

$perfil->guardar();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

header("location: ../listado.php?mensaje=1");

?>