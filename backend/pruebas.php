<?php


require_once 'class/Cliente.php';


//$listadoUsuario = Usuario::obtenerUsuario();

//$listadoClientesActivos = Cliente::obtenerActivos();

//$cliente = Cliente::obtenerPorId(5);
//$cliente->getNombre();

$cliente = new Cliente("Nicolas", "Colo");

//$listadoCliente = $cliente->obtenerTodos();

highlight_string(var_export($cliente, true));

//$cliente->setCbu("888888");


$cliente->guardar();



 /*$cliente = Cliente::buscarPorId(1);
 if($cliente){
    echo $cliente->getNombre();
    echo '<br />';
    echo $cliente->getApellido();
 }else{
    echo 'El cliente no ha podido ser encontrado';
 }*/


/*$cliente = Cliente::obtenerPorId(9);

$cliente->eliminar();*/


//highlight_string(var_export($cliente, true));


?>