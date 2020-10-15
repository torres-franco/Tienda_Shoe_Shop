<?php 

    require_once('../../class/Producto.php');

    $productos = new Producto();


    if (isset($_GET['text_buscar'])) {
		$result = Producto::buscarProducto($_GET['text_buscar']);
	} else {
		$result = Producto::obtenerTodoHelpers();
	}

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    
    print json_encode($rows);

?>