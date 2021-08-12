<?php

require_once 'MySQL.php';


class Imagen {

	public $_idImagen;
	public $_nombre;
    public $_idProducto;

	public function __construct($nombre) {
		$this->_nombre = $nombre;
	}

      /**
     * @return mixed
     */
    public function getIdImagen()
    {
        return $this->_idImagen;
    }

    /**
     * @param mixed $_idImagen
     *
     * @return self
     */
    public function setIdImagen($_idImagen)
    {
        $this->_idImagen = $_idImagen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

        return $this;
    }
    

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM imagen";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }

    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$imagen = new Imagen($registro['nombre']);
			$imagen->_idImagen = $registro['id_imagen'];
			$listado[] = $imagen;
		}
		return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM imagen WHERE id_imagen =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $imagen = new Imagen($registro['nombre']);
        $imagen->_idImagen = $registro['id_imagen'];
        $imagen->_idProducto = $registro['id_producto'];

        return $imagen;


    }


    public static function obtenerPorIdProducto($idProducto) {
        
        $sql = "SELECT producto.id_producto, imagen.id_imagen, imagen.nombre FROM imagen
            INNER JOIN producto ON producto.id_producto = imagen.id_producto
            WHERE producto.id_producto = " . $idProducto;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $imagen = new Imagen($registro['nombre']);   
        $imagen->_idMarca = $registro['id_imagen'];
        $imagen->_idProducto = $registro['id_producto'];

        return $imagen;

    }

    /*public function __toString(){
    	return $this->_nombre;
    }*/


    public function guardar() {

    $sql = "INSERT INTO imagen (id_imagen, id_producto, nombre) VALUES (NULL, $this->_idProducto, '$this->_nombre')";

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