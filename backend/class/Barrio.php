<?php 

require_once 'MySQL.php';

/**
 * 
 */
class Barrio {
	
	private $_idBarrio;
	private $_descripcion;

    private $_idCiudad;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

	 /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @param mixed $_idBarrio
     *
     * @return self
     */
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

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

    /**
     * @return mixed
     */
    public function getIdCiudad()
    {
        return $this->_idCiudad;
    }

    /**
     * @param mixed $_idCiudad
     *
     * @return self
     */
    public function setIdCiudad($_idCiudad)
    {
        $this->_idCiudad = $_idCiudad;

        return $this;
    }


    public static function obtenerTodos() {
        $sql = "SELECT * FROM barrio";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $barrio = new Barrio($registro['descripcion']);
            $barrio->_idBarrio = $registro['id_barrio'];
            $barrio->_idCiudad = $registro['id_ciudad'];
            $listado[] = $barrio;
        }
        return $listado;
    }

    

    public function __toString() {
        return $this->_descripcion;
    }  


    public function guardar() {

        $sql = "INSERT INTO barrio (id_barrio, id_ciudad, descripcion) VALUES (NULL, $this->_idCiudad, '$this->_descripcion')";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idBarrio = $idInsertado;
    }


}


?>