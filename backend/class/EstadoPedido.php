<?php

require_once 'MySQL.php';


class EstadoPedido {


    private $_idPedidoEstado;
    private $_descripcion;

    const PENDIENTE = 1;
    const EN_PROCESO = 2;
    const A_FACTURAR = 3;
    const FACTURADO = 4;
    const ANULADO = 5;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
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
        $sql = "SELECT * FROM EstadoPedido";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $estadoPedido = new EstadoPedido($registro['descripcion']);
            $estadoPedido->_idPedidoEstado = $registro['id_estado_pedido'];
            $listado[] = $estadoPedido;
        }
        return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM EstadoPedido WHERE id_estado_pedido =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $estadoPedido = new EstadoPedido($registro['descripcion']);
        $estadoPedido->_idPedidoEstado = $registro['id_estado_pedido'];

        return $estadoPedido;


    }

    public static function obtenerPorIdPedido($idPedido) {
        
        $sql = "SELECT * FROM pedido INNER JOIN estadoPedido ON pedido.id_pedido_estado = estadopedido.id_estado_pedido WHERE id_pedido = " . $idPedido;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $estadoPedido = new EstadoPedido($registro['descripcion']);   
        $estadoPedido->_idEstadoPedido = $registro['id_estado_pedido'];

        return $estadoPedido;

    }

    public function __toString() {
        return $this->_descripcion;
    }


    public function guardar() {

        $sql = "INSERT INTO estadopedido (id_estado_pedido, descripcion) VALUES (NULL, '$this->_descripcion')";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEstadoPedido = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE estadopedido SET descripcion = '$this->_descripcion' WHERE id_estado_pedido = $this->_idEstadoPedido";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);

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