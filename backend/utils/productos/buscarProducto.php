<?php 

    require_once('../../class/Producto.php');


    if (isset($_GET['text_buscar'])) {
		$listadoProducto = Producto::buscarPorDescripcion($_GET['text_buscar']);
	} else {
		$listadoProducto = Producto::obtenerTodo();
	}

    //highlight_string(var_export($listadoProducto, true));
    
    print json_encode($listadoProducto);

?>