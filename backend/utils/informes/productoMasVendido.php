<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Factura.php');



	$sql = "SELECT pro.descripcion as producto, SUM(dp.cantidad) AS cantidad FROM factura INNER JOIN pedidodetalle AS dp ON dp.id_pedido = factura.id_pedido INNER JOIN producto AS pro ON pro.id_producto = dp.id_producto INNER JOIN categoria as c ON pro.id_categoria = c.id_categoria INNER JOIN marca as m ON pro.id_marca = m.id_marca GROUP BY pro.descripcion ORDER BY cantidad DESC LIMIT 5";

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


?>