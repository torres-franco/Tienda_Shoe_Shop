<?php 

require_once('../../class/MySQL.php');
require_once('../../class/Factura.php');



	$sql = "SELECT MONTHNAME(factura.fecha_emision) AS mes, SUM(dp.cantidad * dp.precio) as total FROM factura 
			INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido 
			INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido 
			INNER JOIN producto as pro ON dp.id_producto = pro.id_producto 
			GROUP BY mes DESC";

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

    
    //print json_encode($listaFactura);
    //highlight_string(var_export($listadoFactura, true));
    //exit;
    
    //print json_encode($listaFactura);

?>