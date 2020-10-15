<?php

require_once 'MySQL.php';
require_once 'Producto.php';
require_once 'Pedido.php';

class PedidoDetalle {
	
	public $_idPedidoDetalle;
    public $_idPedido;
    public $_cantidad;
    public $_precio;
    public $_idProducto;

    public $producto;
    public $pedido;



    /**
     * @return mixed
     */
    public function getIdPedidoDetalle()
    {
        return $this->_idPedidoDetalle;
    }

    /**
     * @param mixed $_idPedidoDetalle
     *
     * @return self
     */
    public function setIdPedidoDetalle($_idPedidoDetalle)
    {
        $this->_idPedidoDetalle = $_idPedidoDetalle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->_idPedido;
    }

    /**
     * @param mixed $_idPedido
     *
     * @return self
     */
    public function setIdPedido($_idPedido)
    {
        $this->_idPedido = $_idPedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    /**
     * @param mixed $_cantidad
     *
     * @return self
     */
    public function setCantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        
       return $this->_precio;

    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio()
    {
        $this->_precio = $this->producto->getPrecio();

        return $this;
    }

        /**
     * @return mixed
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @param mixed $pedido
     *
     * @return self
     */
    public function setPedido($pedido)
    {
        $this->pedido = Pedido::obtenerPorId($this->_idPedido);

        return $this;
    }

    public static function obtenerPorId($idPedidoDetalle) {
        $sql = "SELECT * FROM pedidodetalle WHERE id_pedido_detalle = ".$idPedidoDetalle;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $pedidoDetalle = self::_generarListadoDetallePedido($datos);


        return $pedidoDetalle;
    }

    public static function obtenerPorIdPedido($idPedido) {
        
        $sql = "SELECT * FROM pedidodetalle INNER JOIN pedido ON pedidodetalle.id_pedido = pedido.id_pedido WHERE pedido.id_pedido = " . $idPedido;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $pedidoDetalle = self::_generarListadoDetallePedido($datos);


        return $pedidoDetalle;

    }

    public function _generarListadoDetallePedido($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $pedidoDetalle = self::_generarDetallePedido($registro);
            $listado[] = $pedidoDetalle;
            }
        return $listado;
    }

    public function _generarDetallePedido ($registro){
        $pedidoDetalle = new PedidoDetalle();
        $pedidoDetalle->_idPedidoDetalle = $registro['id_pedido_detalle'];
        $pedidoDetalle->_idProducto = $registro['id_producto'];
        $pedidoDetalle->_idPedido = $registro['id_pedido'];
        $pedidoDetalle->_precio = $registro['precio'];
        $pedidoDetalle->_cantidad = $registro['cantidad'];
        $pedidoDetalle->setProducto();

        return $pedidoDetalle;
    }

    public function __toString() {
        return $this->_cantidad ." ". $this->_precio;
    }

    public function guardar() {

        $sql = "INSERT INTO pedidodetalle (id_pedido_detalle, id_producto, id_pedido, cantidad, precio) "
             . "VALUES (NULL, $this->_idProducto, $this->_idPedido, $this->_cantidad, $this->_precio)";

        var_dump($sql);
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPedidoDetalle = $idInsertado;
    }

    public function setProducto() {
        $this->producto = Producto::obtenerPorId($this->_idProducto);
    }


    public function calcularSubtotal(){

        $subtotal = $this->_cantidad * $this->_precio;

        return $subtotal;

    }

    public function eliminar($idPedido){
        $sql = "DELETE FROM pedidodetalle WHERE id_pedido = " .$idPedido;
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }





    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

        return $this;
    }


}
    

    


?>