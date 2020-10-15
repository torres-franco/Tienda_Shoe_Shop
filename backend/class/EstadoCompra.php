<?php

require_once 'MySQL.php';


class EstadoCompra {

    private $_idEstadoCompra;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
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
        $sql = "SELECT * FROM estadocompra";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $estadoCompra = new EstadoCompra($registro['descripcion']);
            $estadoCompra->_idEstadoCompra = $registro['id_estado_compra'];
            $listado[] = $estadoCompra;
        }
        return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM estadocompra WHERE id_estado_compra =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $estadoCompra = new EstadoCompra($registro['descripcion']);
        $estadoCompra->_idEstadoCompra = $registro['id_estado_compra'];

        return $estadoCompra;


    }

    public static function obtenerPorIdCompra($idCompra) {
        
        $sql = "SELECT * FROM compra INNER JOIN estadoCompra ON compra.id_estado_compra = estadocompra.id_estado_compra WHERE id_compra = " . $idCompra;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $estadoCompra = new EstadoCompra($registro['descripcion']);   
        $estadoCompra->_idEstadoCompra = $registro['id_estado_compra'];

        return $estadoCompra;

    }

    public function __toString() {
        return $this->_descripcion;
    }


    public function guardar() {

        $sql = "INSERT INTO estadocompra (id_estado_compra, descripcion) VALUES (NULL, '$this->_descripcion')";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEstadoCompra = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE estadocompra SET descripcion = '$this->_descripcion' WHERE id_estado_comrpa = $this->_idEstadoCompra";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }

}


?>