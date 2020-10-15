<?php

require_once 'MySQL.php';
require_once 'Producto.php';
require_once 'Compra.php';

class DetalleCompra {
	
	public $_idDetalleCompra;
    public $_idCompra;
    public $_idProducto;
    public $_cantidad;
    public $_precio;

    public $producto;
    public $compra;


        /**
     * @return mixed
     */
    public function getIdDetalleCompra()
    {
        return $this->_idDetalleCompra;
    }

    /**
     * @param mixed $_idDetalleCompra
     *
     * @return self
     */
    public function setIdDetalleCompra($_idDetalleCompra)
    {
        $this->_idDetalleCompra = $_idDetalleCompra;

        return $this;
    }

        /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->_idCompra;
    }

    /**
     * @param mixed $_idCompra
     *
     * @return self
     */
    public function setIdCompra($_idCompra)
    {
        $this->_idCompra = $_idCompra;

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
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * @param mixed $pedido
     *
     * @return self
     */
    public function setCompra($compra)
    {
        $this->compra = Compra::obtenerPorId($this->_idCompra);

        return $this;
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


    public static function obtenerPorId($idDetalleCompra) {
        $sql = "SELECT * FROM detallecompra WHERE id_detalle_compra = ".$idDetalleCompra;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $detalleCompra = self::_generarListadoDetalleCompra($datos);


        return $detalleCompra;
    }

    public static function obtenerPorIdCompra($idCompra) {
        
        $sql = "SELECT * FROM detallecompra INNER JOIN compra ON detallecompra.id_compra = compra.id_compra WHERE compra.id_compra = " . $idCompra;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $detalleCompra = self::_generarListadoDetalleCompra($datos);


        return $detalleCompra;

    }

    public function _generarListadoDetalleCompra($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $detalleCompra = self::_generarDetalleCompra($registro);
            $listado[] = $detalleCompra;
            }
        return $listado;
    }

    public function _generarDetalleCompra ($registro){
        $detalleCompra = new DetalleCompra();
        $detalleCompra->_idDetalleCompra = $registro['id_detalle_compra'];
        $detalleCompra->_idProducto = $registro['id_producto'];
        $detalleCompra->_idCompra = $registro['id_compra'];
        $detalleCompra->_precio = $registro['precio'];
        $detalleCompra->_cantidad = $registro['cantidad'];
        $detalleCompra->setProducto();

        return $detalleCompra;
    }

    public function __toString() {
        return $this->_cantidad ." ". $this->_precio;
    }

    public function guardar() {

        $sql = "INSERT INTO detalleCompra (id_detalle_compra, id_compra, id_producto, precio, cantidad) "
             . "VALUES (NULL, $this->_idCompra, $this->_idProducto, $this->_precio, $this->_cantidad)";

        var_dump($sql);
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDetalleCompra = $idInsertado;
    }

    public function setProducto() {
        $this->producto = Producto::obtenerPorId($this->_idProducto);
    }


    public function calcularSubtotal(){

        $subtotal = $this->_cantidad * $this->_precio;

        return $subtotal;

    }

    public function eliminar($idCompra){
        $sql = "DELETE FROM detallecompra WHERE id_compra = " .$idCompra;
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }



}
    

    


?>