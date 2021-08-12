<?php
require_once "../../class/MySQL.php";
require_once "../../class/Producto.php";
require_once "../../class/Marca.php";

$idMarca = $_GET['idMarca'];

$sql = "SELECT producto.id_producto, marca.descripcion, producto.descripcion, producto.stock_actual, producto.stock_minimo FROM producto INNER JOIN marca ON producto.id_marca = marca.id_marca WHERE ";
$finalSql =" GROUP BY producto.id_producto";

if (isset($idMarca)) {
    if (!empty($idMarca)) {
        $sql .= "id_producto AND marca.id_marca = $idMarca";
 
	$sql .= $finalSql;
	$mysql = new MySQL();
	$datos = $mysql->consultar($sql);
	$mysql->desconectar();
	
	$listado = array();
	if ($datos->num_rows > 0){
	    while($r = mysqli_fetch_assoc($datos)) {
	        $listado[] = $r;
	    }
    } else {
    	$listado[] = $datos;
    }
	echo json_encode($listado);
	exit;	   
	}
}

?>