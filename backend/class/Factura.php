<?php

require_once 'MySQL.php';
require_once 'Pedido.php';
require_once 'TipoPago.php';
/**
  * 
  */
 class Factura {
	
	private $_idFactura;
    private $_numero;
    private $_fechaEmsion;
    private $_tipo;
    private $_idTipoPago;
    private $_idPedido;

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
    public function getFechaEmsion()
    {
        return $this->_fechaEmsion;
    }

    /**
     * @param mixed $_fechaEmsion
     *
     * @return self
     */
    public function setFechaEmsion($_fechaEmsion)
    {
        $this->_fechaEmsion = $_fechaEmsion;

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
    	$sql = "SELECT * FROM Factura";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoFactura($datos);

    	return $listado;

    }

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

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM factura WHERE id_factura =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $factura = self::_generarListadoFactura($datos);


        return $factura;


    }

    public function _generarListadoFactura($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $factura = self::_generarFactura($registro);
            $listado[] = $factura;
            }
        return $listado;
    }

    public function _generarFactura ($registro){
        $factura = new Factura();
        $factura->_idFactura = $registro['id_factura'];
        $factura->_numero = $registro['numero'];
        $factura->_fechaEmsion = $registro['fecha_emision'];
        $factura->_tipo = $registro['tipo'];
        $factura->_idPedido = $registro['id_pedido'];
        $factura->setPedido();
        $factura->_idTipoPago = $registro['id_tipo_pago'];
        $factura->setTipoPago();

        return $factura;
    }


    public function guardar() {

        $sql = "INSERT INTO factura (id_factura, id_pedido, numero, fecha_emision) "
             . "VALUES (NULL, $this->_idPedido, $this->_numero, '$this->_tipo')";

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
}


?>