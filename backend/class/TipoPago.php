<?php

require_once 'MySQL.php';


class TipoPago {


    private $_idTipoPago;
    private $_descripcion;

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
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM TipoPago";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $tipoPago = new TipoPago();
            $tipoPago->_idTipoPago = $registro['id_tipo_pago'];
            $tipoPago->_descripcion = $registro['descripcion'];
            $listado[] = $tipoPago;
        }
        return $listado;
    }


    public static function obtenerPorIdFactura($idFactura) {
        
        $sql = "SELECT factura.id_factura, tipopago.id_tipo_pago, tipopago.descripcion FROM factura INNER JOIN tipopago ON factura.id_tipo_pago = tipopago.id_tipo_pago WHERE id_factura = " . $idFactura;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $tipoPago = self::_generarListadoTipoPago($datos);

        return $tipoPago;


    }

    public static function obtenerPorIdCompra($idCompra) {
        
        $sql = "SELECT compra.id_compra, tipopago.id_tipo_pago, tipopago.descripcion FROM compra INNER JOIN tipopago ON compra.id_tipo_pago = tipopago.id_tipo_pago WHERE id_compra = " . $idCompra;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $tipoPago = self::_generarListadoTipoPago($datos);

        return $tipoPago;


    }


    public function _generarListadoTipoPago($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc()){
            
            $tipoPago = self::_generarTipoPago($registro);
            $listado[] = $tipoPago;
        
        }

        return $listado;
    }

    public function _generarTipoPago($registro){
        $tipoPago = new TipoPago();
        $tipoPago->_idTipoPago = $registro['id_tipo_pago'];
        $tipoPago->_descripcion = $registro['descripcion'];

        return $tipoPago;
    }

    public function guardar() {

    $sql = "INSERT INTO tipopago (id_tipo_pago, descripcion) VALUES (NULL, '$this->_descripcion')";

    $mysql = new MySQL();
    $idInsertado = $mysql->insertar($sql);

    $this->_idColor = $idInsertado;

    }

    public function actualizar() {
        
        $sql = "UPDATE TipoPago SET descripcion = '$this->_descripcion' WHERE id_tipo_pago = $this->_idTipoPago";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }


    public function __toString() {
        return $this->_descripcion;
    }

  

}


?>