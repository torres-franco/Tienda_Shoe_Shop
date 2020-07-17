<?php 

require_once 'MySQL.php';

/**
 * 
 */
class Ciudad {
	
	private $_idCiudad;
	private $_nombre;
	private $_codigoPostal;

    public function __construct($nombre, $codigoPostal) {
        $this->_nombre = $nombre;
        $this->_codigoPostal = $codigoPostal;
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
    public function getCodigoPostal()
    {
        return $this->_codigoPostal;
    }

    /**
     * @param mixed $_codigoPostal
     *
     * @return self
     */
    public function setCodigoPostal($_codigoPostal)
    {
        $this->_codigoPostal = $_codigoPostal;

        return $this;
    }


    public static function obtenerTodos() {
        $sql = "SELECT * FROM ciudad";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $ciudad = new Ciudad ($registro['nombre'], $registro['codigo_postal']);
            $ciudad->_idCiudad = $registro['id_ciudad'];
            $ciudad->_idProvincia = $registro['id_provincia'];
            $listado[] = $ciudad;
        }
        return $listado;
    }

    public function __toString() {
        return $this->_nombre . ", " . $this->_codigoPostal;
    } 


    /*public function guardar() {
        $sql = "INSERT INTO Barrio (id_barrio, descripcion) VALUES (NULL, $this->_descripcion)";

        //echo $sql;
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPersona = $idInsertado;
    }*/
     

}


?>