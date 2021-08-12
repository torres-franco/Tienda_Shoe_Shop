<?php  

require_once "MySQL.php";

class Informe{

	public static function obtenerInformeVenta() {

		if (isset($_GET['txtFechaDesde'])) {
		    $fechaDesde = $_GET['txtFechaDesde'];
		}

		if (isset($_GET['txtFechaHasta'])) {
		    $fechaHasta = $_GET['txtFechaHasta'];
		}

		if (isset($_GET['cboMarca'])) {
		    $marca = $_GET['cboMarca'];
		}

    	$sql = "SELECT factura.fecha_emision, dp.cantidad, pro.descripcion as Producto, c.descripcion as Categoria, m.descripcion as Marca, SUM(dp.cantidad * dp.precio) as total FROM factura INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido INNER JOIN producto as pro ON dp.id_producto = pro.id_producto INNER JOIN categoria as c ON pro.id_categoria = c.id_categoria INNER JOIN marca as m ON pro.id_marca = m.id_marca WHERE factura.fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta' AND m.id_marca = $marca GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);

    }

}


?>