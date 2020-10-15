<?php
require_once "../../class/Ciudad.php";
$id = $_GET['id'];

$listadoCiudad = Ciudad::obtenerPorIdProvincia($id);
if ($id == 0){
$options = "<option>Seleccionar</option>";}

elseif ($id != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoLocalidad as $localidad) {
	$options .= '<option value="'.$localidad->getIdLocalidad().'">'.$localidad->getDescripcion().'</option>';
	}
}



echo $options;
?>