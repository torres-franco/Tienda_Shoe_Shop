<?php

require_once 'MySQL.php';
require_once 'EstadoCompra.php';
require_once 'Proveedor.php';
require_once 'DetalleCompra.php';
require_once 'TipoPago.php';
/**
  * 
  */
 class Compra {
	
	public $_idCompra;
    public $_numeroCompra;
    public $_fechaCompra;
	public $_idProveedor;
    public $_idEstadoCompra;
    public $_idTipoPago;
    public $_arrDetalleCompra;

    public $proveedor;
    public $estadoCompra;


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
    public function getNumeroCompra()
    {
        return $this->_numeroCompra;
    }

    /**
     * @param mixed $_numeroCompra
     *
     * @return self
     */
    public function setNumeroCompra($_numeroCompra)
    {
        $this->_numeroCompra = $_numeroCompra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaCompra()
    {
        return $this->_fechaCompra;
    }

    /**
     * @param mixed $_fechaCompra
     *
     * @return self
     */
    public function setFechaCompra($_fechaCompra)
    {
        $this->_fechaCompra = $_fechaCompra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */
    public function setIdProveedor($_idProveedor)
    {
        $this->_idProveedor = $_idProveedor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEstadoCompra()
    {
        return $this->_idEstadoCompra;
    }

    /**
     * @param mixed $_idEstadoCompra
     *
     * @return self
     */
    public function setIdEstadoCompra($_idEstadoCompra)
    {
        $this->_idEstadoCompra = $_idEstadoCompra;

        return $this;
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
    public function getArrDetalleCompra()
    {
        return $this->_arrDetalleCompra;
    }

    /**
     * @param mixed $_arrDetalleCompra
     *
     * @return self
     */
    public function setArrDetalleCompra()
    {
        $this->_arrDetalleCompra = DetalleCompra::obtenerPorIdCompra($this->_idCompra);

        //var_dump($this->_arrDetalleCompra);

        return $this;
    }

    
    

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM compra ORDER BY id_compra DESC LIMIT 6";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoCompra($datos);

    	return $listado;

    }

    private function _generarListadoCompra($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$compra = new Compra();
			$compra->_idCompra = $registro['id_compra'];
            $compra->_numeroCompra = $registro['numero_compra'];
            $compra->_fechaCompra = $registro['fecha'];
            $compra->_idProveedor = $registro['id_proveedor'];
            $compra->setProveedor();
            $compra->_idEstadoCompra = $registro['id_estado_compra'];
            $compra->setEstadoCompra();
            $compra->_idTipoPago = $registro['id_tipo_pago'];
            $compra->setTipoPago();
            
            $compra->setArrDetalleCompra();
			
            $listado[] = $compra;

		}
		  
        return $listado;
    }

    private function _generarCompra($registro) {

        $compra = new Compra();
        $compra->_idCompra = $registro['id_compra'];
        $compra->_numeroCompra = $registro['numero_compra'];
        $compra->_fechaCompra = $registro['fecha'];
        $compra->_idProveedor = $registro['id_proveedor'];
        $compra->setProveedor();
        $compra->_idEstadoCompra = $registro['id_estado_compra'];
        $compra->setEstadoCompra();
        $compra->_idTipoPago = $registro['id_tipo_pago'];
        $compra->setTipoPago();
            
        $compra->setArrDetalleCompra();

        return $compra;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM compra WHERE id_compra =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $compra = self::_generarCompra($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $compra;


    }

    public function guardar() {

        $sql = "INSERT INTO compra (id_compra, id_proveedor, id_estado_compra, fecha, id_tipo_pago) "
             . "VALUES (NULL, $this->_idProveedor, $this->_idEstadoCompra, '$this->_fechaCompra', $this->_idTipoPago)";

        var_dump($sql);
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCompra = $idInsertado;
    }

    public function actualizar(){
        $sql = "UPDATE compra SET id_proveedor = $this->_idProveedor, id_estado_compra = $this->_idEstadoCompra, fecha = '$this->_fechaCompra', id_tipo_pago = $this->_idTipoPago WHERE id_compra = $this->_idCompra";

        $mysql = new MySQL();
        $mysql->actualizar($sql);

        //var_dump($sql);
    }

    /*public function obtenerPorIdFactura($idFactura){

        $sql = "SELECT * FROM factura INNER JOIN pedido ON factura.id_pedido = pedido.id_pedido WHERE id_factura = " . $idFactura;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $listado = self::_generarPedido($registro);

        //highlight_string(var_export($registro, true));

        //exit();

        return $listado;

    }*/



    public function setEstadoCompra() {
        $this->estadoCompra = EstadoCompra::obtenerPorId($this->_idEstadoCompra);

        return $this;
    }

    public function setProveedor() {
        $this->proveedor = Proveedor::obtenerPorId($this->_idProveedor);

        return $this;
    }

    public function setDetalleCompra() {
        $this->detalleCompra = DetalleCompra::obtenerPorIdCompra($this->_idCompra);
    }

    public function setTipoPago() {
        $this->tipoPago = TipoPago::obtenerPorIdFactura($this->_idCompra);
    }

    public function calcularTotal(){
        $total = 0;
        foreach ($this->_arrDetalleCompra as $detalle) {
            $total = $total + $detalle->calcularSubtotal();
        }

        return $total;
    }


}


?>