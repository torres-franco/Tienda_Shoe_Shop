<?php

require_once '../../class/Barrio.php';

$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);

?>