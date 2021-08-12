<?php 

    require_once('../../class/Producto.php');


   
	$listadoProducto = Producto::obtenerTodo();

    //highlight_string(var_export($listadoProducto, true));
    
    print json_encode($listadoProducto);

?>