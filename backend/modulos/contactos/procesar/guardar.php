<?php

require_once '../../../class/Contacto.php';

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];
$valor = $_POST['txtValor'];
$idTipoContacto = $_POST['cboTipoContacto'];


$contacto = new contacto();
$contacto->setValor($valor);
$contacto->setIdTipoContacto($idTipoContacto);
$contacto->setIdPersona($idPersona);

$contacto->guardar();

header("location: /proyecto_shoe_shop/backend/modulos/$modulo/detalle.php?id=$idLlamada");

?>