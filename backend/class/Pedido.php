<?php

require_once 'MySQL.php';
require_once 'EstadoPedido.php';
require_once 'Cliente.php';
require_once 'PedidoDetalle.php';
/**
  * 
  */
 class Pedido {
	
	  public $_idPedido;
    public $_fechaPedido;
	  public $_idCliente;
    public $_arrDetallePedido;
    public $_idPedidoEstado;
    //public $_metodoPago;

    public $cliente;
    public $estadoPedido;


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
    public function getFechaPedido()
    {
        return $this->_fechaPedido;
    }

    /**
     * @param mixed $_fechaPedido
     *
     * @return self
     */
    public function setFechaPedido($_fechaPedido)
    {
        $this->_fechaPedido = $_fechaPedido;

        return $this;
    }

        /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->_idCliente;
    }

    /**
     * @param mixed $_idCliente
     *
     * @return self
     */
    public function setIdCliente($_idCliente)
    {
        $this->_idCliente = $_idCliente;

        return $this;
    }

        /**
     * @return mixed
     */
    public function getArrDetallePedido()
    {
        return $this->_arrDetallePedido;
    }

    /**
     * @param mixed $_arrDetallePedido
     *
     * @return self
     */
    public function setArrDetallePedido()
    {
        $this->_arrDetallePedido = PedidoDetalle::obtenerPorIdPedido($this->_idPedido);

        return $this;
    }


    
    

    public static function obtenerTodo() {
    	$sql = "SELECT * FROM pedido";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoPedido($datos);

    	return $listado;

    }

    private function _generarListadoPedido($datos) {
    	$listado = array();
		  while ($registro = $datos->fetch_assoc()) {
			  $pedido = new Pedido();
			  $pedido->_idPedido = $registro['id_pedido'];
        $pedido->_idCliente = $registro['id_cliente'];
        $pedido->setCliente();
        $pedido->_idPedidoEstado = $registro['id_estado_pedido'];
        $pedido->setEstadoPedido();
        $pedido->_fechaPedido = $registro['fecha'];
        //$pedido->_metodoPago = $registro['metodopago'];
        //$pedido->_idPedidoEstado = $registro['id_pedido_estado'];
        //$pedido->setEstadoPedido();
        $pedido->setArrDetallePedido();
			

			  $listado[] = $pedido;

		  }
		  
      return $listado;
    }

    private function _generarPedido($registro) {

        $pedido = new Pedido();
        $pedido->_idPedido = $registro['id_pedido'];
        $pedido->_idCliente = $registro['id_cliente'];
        $pedido->setCliente();
        $pedido->_idPedidoEstado = $registro['id_estado_pedido'];
        $pedido->setEstadoPedido();
        $pedido->_fechaPedido = $registro['fecha'];
        //$pedido->_metodoPago = $registro['metodopago'];
        //$pedido->_idPedidoEstado = $registro['id_pedido_estado'];
        //$pedido->setEstadoPedido();
        $pedido->setArrDetallePedido();

        return $pedido;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM pedido WHERE id_pedido =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $pedido = self::_generarPedido($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $pedido;


    }

    public function guardar() {

        $sql = "INSERT INTO pedido (id_pedido, id_cliente, id_estado_pedido, fecha) "
             . "VALUES (NULL, $this->_idCliente, $this->_idPedidoEstado, '$this->_fechaPedido')";

        var_dump($sql);
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPedido = $idInsertado;
    }

    public function actualizar(){
        $sql = "UPDATE pedido SET id_cliente = $this->_idCliente, id_estado_pedido = $this->_idPedidoEstado, fecha = '$this->_fechaPedido' WHERE id_pedido = $this->_idPedido";

        $mysql = new MySQL();
        $mysql->actualizar($sql);

        //var_dump($sql);
    }

    public function obtenerPorIdFactura($idFactura){

        $sql = "SELECT * FROM factura INNER JOIN pedido ON factura.id_pedido = pedido.id_pedido WHERE id_factura = " . $idFactura;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $listado = self::_generarPedido($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $listado;

    }



    public function setEstadoPedido() {
        $this->estadoPedido = EstadoPedido::obtenerPorId($this->_idPedidoEstado);

        return $this;
    }

    public function setCliente() {
        $this->cliente = Cliente::obtenerPorId($this->_idCliente);

        return $this;
    }

    public function setPedidoDetalle() {
        $this->pedidoDetalle = PedidoDetalle::obtenerPorIdPedido($this->_idPedido);
    }

    public function calcularTotal(){
        $total = 0;
        foreach ($this->_arrDetallePedido as $detalle) {
            $total = $total + $detalle->calcularSubtotal();
        }

        return $total;
    }




    /**
     * @return mixed
     */
    public function getIdPedidoEstado()
    {
        return $this->_idPedidoEstado;
    }

    /**
     * @param mixed $_idPedidoEstado
     *
     * @return self
     */
    public function setIdPedidoEstado($_idPedidoEstado)
    {
        $this->_idPedidoEstado = $_idPedidoEstado;

        return $this;
    }
}


?>