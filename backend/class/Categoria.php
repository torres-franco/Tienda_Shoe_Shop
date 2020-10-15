<?php

require_once 'MySQL.php';


class Categoria {

	public $_idCategoria;
	public $_descripcion;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
	}

    

      /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }

    /**
     * @param mixed $_idCategoria
     *
     * @return self
     */
    public function setIdCategoria($_idCategoria)
    {
        $this->_idCategoria = $_idCategoria;

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
    	$sql = "SELECT * FROM categoria";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }

    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$categoria = new Categoria($registro['descripcion']);
			$categoria->_idCategoria = $registro['id_categoria'];
			$listado[] = $categoria;

		  }
		
    return $listado;

    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM categoria WHERE id_categoria =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $categoria = new Categoria($registro['descripcion']);
        $categoria->_idCategoria = $registro['id_categoria'];

        return $categoria;


    }


    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT * FROM producto 
        INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria
        WHERE id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $categoria = new Categoria($registro['descripcion']);   
        $categoria->_idCategoria = $registro['id_categoria'];

        return $categoria;

    }

    public function __toString() {
    	return $this->_descripcion;
    }

    public function guardar() {

        $sql = "INSERT INTO categoria (id_categoria, descripcion) VALUES (NULL, '$this->_descripcion')";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTalle = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE categoria SET descripcion = '$this->_descripcion' WHERE id_categoria = $this->_idCategoria";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM categoria WHERE id_categoria = $this->_idCategoria";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

  
}


?>