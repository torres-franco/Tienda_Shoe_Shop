<?php

require_once "../../../class/MySQL.php";

require_once "../../../class/Producto.php";	

$idCategoria = $_GET['idCategoria'];
//$idSubCategoria = $_GET['idCategoria'];
$aumento = $_GET['aumento'];

$sql = "UPDATE producto"
		." SET precio = precio+(precio * $aumento / 100) WHERE ";

if (isset($idCategoria)) {
    if (!empty($idCategoria)) {
        $sql .= "id_categoria = '$idCategoria' ";
        

	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;	
    }
}

if (isset($idCategoria)) {
    if (!empty($idCategoria)) {
        $sql .= "id_categoria = $idCategoria ";

	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	var_dump($sql);
	//echo '<br>';
	//echo json_encode($listado);
	exit;	
	}
}
if (isset($idCategoria)) {
    if (!empty($idCategoria)) {
        $sql .= "id_categoria = '$idCategoria' ";
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