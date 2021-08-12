<?php

require_once 'MySQL.php';
require_once 'Pedido.php';
require_once 'TipoPago.php';
/**
  * 
  */
 class Factura {
	
	public $_idFactura;
    public $_numero;
    public $_fechaEmision;
    public $_tipo;
    public $_idTipoPago;
    public $_idPedido;

    public $pedido;
    public $tipoPago;


        /**
     * @return mixed
     */
    public function getIdFactura()
    {
        return $this->_idFactura;
    }

    /**
     * @param mixed $_idFactura
     *
     * @return self
     */
    public function setIdFactura($_idFactura)
    {
        $this->_idFactura = $_idFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * @param mixed $_numero
     *
     * @return self
     */
    public function setNumero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaEmision()
    {
        return $this->_fechaEmision;
    }

    /**
     * @param mixed $_fechaEmsion
     *
     * @return self
     */
    public function setFechaEmision($_fechaEmision)
    {
        $this->_fechaEmision = $_fechaEmision;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->_tipo;
    }

    /**
     * @param mixed $_tipo
     *
     * @return self
     */
    public function setTipo($_tipo)
    {
        $this->_tipo = $_tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->_idTipo;
    }

    /**
     * @param mixed $_idTipo
     *
     * @return self
     */
    public function setIdTipo($_idTipo)
    {
        $this->_idTipo = $_idTipo;

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
     * @return mixed
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }
        

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM factura ORDER BY id_factura DESC LIMIT 6";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoFactura($datos);

    	return $listado;

    }

    /*public static function obtenerInforme() {
        $sql = "SELECT factura.fecha_emision, dp.cantidad, pro.descripcion as Producto, c.descripcion as Categoria, m.descripcion as Marca, SUM(dp.cantidad * dp.precio) as total FROM factura INNER JOIN pedido as p ON p.id_pedido = factura.id_pedido INNER JOIN pedidodetalle as dp ON dp.id_pedido = p.id_pedido INNER JOIN producto as pro ON dp.id_producto = pro.id_producto INNER JOIN categoria as c ON pro.id_categoria = c.id_categoria INNER JOIN marca as m ON pro.id_marca = m.id_marca WHERE factura.fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta' AND m.id_marca = $marca GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoFactura($datos);

        return $listado;

    }*/

    /*private function _generarListadoFactura($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$factura = new Factura();
			$factura->_idFactura = $registro['id_factura'];
            $factura->_idPedido = $registro['id_pedido'];
            $factura->setPedido();
            $factura->_numero = $registro['numero'];
            $factura->_fechaEmsion = $registro['fecha_emision'];
            $factura->_tipo = $registro['tipo'];
            $factura->_idTipoPago = $registro['id_tipo_pago'];
            $factura->setTipoPago();
			

			$listado[] = $factura;
		}
		return $listado;
    }*/

    public function obtenerPorIdNotaCredito($idNotaCredito){

        $sql = "SELECT * FROM notacredito INNER JOIN factura ON notacredito.id_factura = factura.id_factura WHERE id_nota_credito = " . $idNotaCredito;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $listado = self::_generarFactura($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $listado;

    }

    public static function obtenerPorId($idFactura) {

        $sql = "SELECT * FROM factura WHERE id_factura =" . $idFactura;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $factura = self::_generarFactura($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $factura;


    }

    public function _generarListadoFactura($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idFactura = $registro['id_factura'];
            $factura->_numero = $registro['numero'];
            $factura->_fechaEmision = $registro['fecha_emision'];
            $factura->_tipo = $registro['tipo'];
            $factura->_idPedido = $registro['id_pedido'];
            $factura->setPedido();
            $factura->_idTipoPago = $registro['id_tipo_pago'];
            $factura->setTipoPago();
            

            $listado[] = $factura;

          }
          
    return $listado;
    }


    public function _generarFactura ($registro){
        $factura = new Factura();
        $factura->_idFactura = $registro['id_factura'];
        $factura->_numero = $registro['numero'];
        $factura->_fechaEmision = $registro['fecha_emision'];
        $factura->_tipo = $registro['tipo'];
        $factura->_idPedido = $registro['id_pedido'];
        $factura->setPedido();
        $factura->_idTipoPago = $registro['id_tipo_pago'];
        $factura->setTipoPago();

        return $factura;
    }


    public function guardar() {

        $sql = "INSERT INTO factura (id_factura, id_pedido, id_tipo_pago, numero, tipo, fecha_emision) "
             . "VALUES (NULL, $this->_idPedido, $this->_idTipoPago, $this->_numero, '$this->_tipo', '$this->_fechaEmision')";

        //echo $sql;
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFactura = $idInsertado;
    }


    public function setPedido() {
        $this->pedido = Pedido::obtenerPorIdFactura($this->_idFactura);
    }

    public function setTipoPago() {
        $this->tipoPago = TipoPago::obtenerPorIdFactura($this->_idFactura);
    }




    /**
     * @return mixed
     */
    public function getIdTipoPago()
    {
        return $this->_idTipoPago;
    }

    /**
     * @param mixed $_idTipoPago
     *
     * @return self
     */
    public function setIdTipoPago($_idTipoPago)
    {
        $this->_idTipoPago = $_idTipoPago;

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

    public function __toString(){
        return $this->_tipo;
    }
}


?>