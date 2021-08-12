<?php

session_start();

require_once "../../../class/MySQL.php";

require_once "../../../class/Producto.php";	

$idMarca = $_GET['idMarca'];
$aumento = $_GET['aumento'];

/*if (empty(trim($idMarca))) {
	$_SESSION['mensaje_error'] = "Seleccione una marca";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($aumento))) {
	$_SESSION['mensaje_error'] = "Debe ingresar un porcentaje";
	header("location: ../alta.php");
	exit;
}*/

$sql = "UPDATE producto"
		." SET precio = precio+(precio * $aumento / 100) WHERE ";

if (isset($idMarca)) {
    if (!empty($idMarca)) {
        $sql .= "id_marca = '$idMarca' ";
        

	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;	
    }
}

if (isset($idMarca)) {
    if (!empty($idMarca)) {
        $sql .= "id_marca = $idMarca ";

	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;	
	}
}
if (isset($idMarca)) {
    if (!empty($idMarca)) {
        $sql .= "id_marca = '$idMarca' ";
    $mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;    
    }		           
}

?>