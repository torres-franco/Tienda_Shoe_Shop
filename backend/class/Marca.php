<?php

require_once 'MySQL.php';


class Marca {

	private $_idMarca;
	private $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}

    
    /* @return mixed
     */
    public function getIdMarca()
    {
        return $this->_idMarca;
    }

    /**
     * @param mixed $_idMarca
     *
     * @return self
     */
    public function setIdMarca($_idMarca)
    {
        $this->_idMarca = $_idMarca;

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
    	$sql = "SELECT * FROM marca";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }

    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$marca = new Marca($registro['descripcion']);
			$marca->_idMarca = $registro['id_marca'];
			$listado[] = $marca;
		}
		return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM marca WHERE id_marca =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $marca = new Marca($registro['descripcion']);
        $marca->_idMarca = $registro['id_marca'];

        return $marca;


    }


    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN marca ON producto.id_marca = marca.id_marca
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $marca = new Marca($registro['descripcion']);   
        $marca->_idMarca = $registro['id_marca'];

        return $marca;

    }

    public function __toString(){
    	return $this->_descripcion;
    }


    public function guardar() {

    $sql = "INSERT INTO marca (id_marca, descripcion) VALUES (NULL, '$this->_descripcion')";

    $mysql = new MySQL();
    $idInsertado = $mysql->insertar($sql);

    $this->_idMarca = $idInsertado;

    }

    public function actualizar() {
        
        $sql = "UPDATE marca SET descripcion = '$this->_descripcion' WHERE id_marca = $this->_idMarca";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM marca WHERE id_marca = $this->_idMarca";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }


}


?>