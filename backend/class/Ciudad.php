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

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM ciudad WHERE id_ciudad =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $ciudad = new Ciudad($registro['nombre'], $registro['codigo_postal']);
        $ciudad->_idCiudad = $registro['id_ciudad'];

        return $ciudad;


    }

    public function __toString() {
        return $this->_nombre . ", " . $this->_codigoPostal;
    } 


    public function guardar() {

        $sql = "INSERT INTO ciudad (id_ciudad, nombre, codigo_postal) VALUES (NULL, '$this->_nombre', $this->_codigoPostal)";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idBarrio = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE ciudad SET nombre = '$this->_nombre', codigo_postal = $this->_codigoPostal WHERE id_ciudad = $this->_idCiudad";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM ciudad WHERE id_ciudad = $this->_idCiudad";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
     

}


?>