<?php

require_once "../../../class/Usuario.php";


$user = $_POST['txtUsuario'];
$clave = $_POST['txtClave'];


$usuario = Usuario::login($user, $clave);

//highlight_string(var_export($usuario, true));
//exit;


if ($usuario->estaLogueado()) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	header("location: ../../../modulos/dashboard/listado.php");
} else {
	header("location: ../../../index.php?mensaje=1");

}

?>