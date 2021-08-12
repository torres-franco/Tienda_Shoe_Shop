<?php
require_once '../../class/Barrio.php';

$idRecibido = $_GET['id'];

$listadoBarrio = Barrio::obtenerPorIdCiudad($idRecibido);

//highlight_string(var_export($listadoBarrio, true));
//exit;

if ($idRecibido == 0){
	
	$options = "<option>Seleccionar</option>";}

elseif ($idRecibido != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoBarrio as $barrio) {
	$options .= '<option value="'.$barrio->getIdBarrio().'">'.utf8_encode($barrio->getDescripcion()).'</option>';
	}
}


echo $options;

?>