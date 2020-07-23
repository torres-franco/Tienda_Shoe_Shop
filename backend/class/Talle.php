<?php

require_once 'MySQL.php';


class Talle {

    private $_idTalle;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

    
    /**
     * @return mixed
     */
    public function getIdTalle()
    {
        return $this->_idTalle;
    }

    /**
     * @param mixed $_idTalle
     *
     * @return self
     */
    public function setIdTalle($_idTalle)
    {
        $this->_idTalle = $_idTalle;

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
        $sql = "SELECT * FROM talle";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $talle = new Talle($registro['descripcion']);
            $talle->_idTalle = $registro['id_talle'];
            $listado[] = $talle;
        }
        return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM talle WHERE id_talle =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $talle = new Talle($registro['descripcion']);
        $talle->_idTalle = $registro['id_talle'];

        return $talle;


    }

    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN talle ON producto.id_talle = talle.id_talle
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $talle = new Talle($registro['descripcion']);   
        $talle->_idTalle = $registro['id_talle'];

        return $talle;

    }

    public function __toString() {
        return $this->_descripcion;
    }


    public function guardar() {

        $sql = "INSERT INTO talle (id_talle, descripcion) VALUES (NULL, '$this->_descripcion')";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTalle = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE talle SET descripcion = '$this->_descripcion' WHERE id_talle = $this->_idTalle";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM talle WHERE id_talle = $this->_idTalle";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    
}


?>