<?php
require_once '../../class/Provincia.php';

$id = $_GET['id'];

$listadoProvincia = Provincia::obtenerPorId($id);
if ($id == 0){
	
	$options = "<option>Seleccionar</option>";}

elseif ($id != 0) {
	$options = "<option value=0>Seleccionar</option>";
	foreach ($listadoProvincia as $provincia) {
	$options .= '<option value="'.$provincia->getIdProvincia().'">'.$provincia->getDescripcion().'</option>';
	}
}


echo $options;

?>