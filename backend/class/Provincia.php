<?php 

require_once 'MySQL.php';

/**
 * 
 */
class Provincia {
	
	private $_idProvincia;
	private $_nombre;

    public function __construct($nombre) {
        $this->_nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdProvincia()
    {
        return $this->_idProvincia;
    }

    /**
     * @param mixed $_idProvincia
     *
     * @return self
     */
    public function setIdProvincia($_idProvincia)
    {
        $this->_idProvincia = $_idProvincia;

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



    public static function obtenerTodos() {
        $sql = "SELECT * FROM provincia";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $provincia = new Provincia ($registro['nombre']);
            $provincia->_idProvincia = $registro['id_provincia'];
            $listado[] = $provincia;
        }
        return $listado;
    }


    

    public function __toString() {
        return $this->_nombre;
    }   


}


?>