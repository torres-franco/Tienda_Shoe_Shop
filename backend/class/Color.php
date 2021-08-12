<?php

require_once 'MySQL.php';


class Color {

    private $_idColor;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

    
    /**
     * @return mixed
     */
    public function getIdColor()
    {
        return $this->_idColor;
    }

    /**
     * @param mixed $_idColor
     *
     * @return self
     */
    public function setIdColor($_idColor)
    {
        $this->_idColor = $_idColor;

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
        $sql = "SELECT * FROM color";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $color = new Color($registro['descripcion']);
            $color->_idColor = $registro['id_color'];
            $listado[] = $color;
        }
        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM color WHERE id_color =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $color = new Color($registro['descripcion']);
        $color->_idColor = $registro['id_color'];

        return $color;


    }

    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN color ON producto.id_color = color.id_color
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $color = new Color($registro['descripcion']);   
        $color->_idColor = $registro['id_color'];

        return $color;

    }

    public function __toString() {
        return $this->_descripcion;
    }


    public function guardar() {

    $sql = "INSERT INTO color (id_color, descripcion) VALUES (NULL, '$this->_descripcion')";

    $mysql = new MySQL();
    $idInsertado = $mysql->insertar($sql);

    $this->_idColor = $idInsertado;

    }

    public function actualizar() {
        
        $sql = "UPDATE color SET descripcion = '$this->_descripcion' WHERE id_color = $this->_idColor";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM color WHERE id_color = $this->_idColor";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    function comprobarExistenciaColor($descripcion){
        $sql = "SELECT * FROM color WHERE descripcion = '$descripcion' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0 ) {
            $_SESSION['mensaje_error'] = "El color ya existe en el sistema.";
            header('Location: ../alta.php');
            exit;
        } 
    }

  
}


?>