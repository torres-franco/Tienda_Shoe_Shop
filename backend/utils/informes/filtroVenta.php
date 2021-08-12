<?php 

echo "hola";
exit;

/*require_once('../../class/MySQL.php');
require_once('../../class/Factura.php');



	$sql = "SELECT * FROM Factura";

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
*/
?>