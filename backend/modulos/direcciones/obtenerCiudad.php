<?php
require_once "../../class/Ciudad.php";

$idRecibido = $_GET['id'];

$listadoCiudad = Ciudad::obtenerPorIdProvincia($idRecibido);

//highlight_string(var_export($listadoCiudad, true));
//exit;

if ($idRecibido == 0){
$options = "<option>Seleccionar</option>";}

elseif ($idRecibido != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoCiudad as $ciudad) {
	$options .= '<option value="'.$ciudad->getIdCiudad().'">'.utf8_encode($ciudad->getNombre()).'</option>';
	}
}



echo $options;
?>