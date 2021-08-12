<?php 

require_once 'MySQL.php';
require_once 'Provincia.php';
/**
 * 
 */
class Ciudad {
	
	private $_idCiudad;
	private $_nombre;
	private $_codigoPostal;
    private $_idProvincia;

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
            //$ciudad->setProvincia();
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
        $ciudad->_idProvincia = $registro['id_provincia'];
        $ciudad->setProvincia();

        return $ciudad;


    }

    public function __toString() {
        return $this->_nombre . ", " . $this->_codigoPostal;
    } 


    public function guardar() {

        $sql = "INSERT INTO ciudad (id_ciudad, id_provincia, nombre, codigo_postal) VALUES (NULL, $this->_idProvincia, '$this->_nombre', $this->_codigoPostal)";

        echo $sql;


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idBarrio = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE ciudad SET nombre = '$this->_nombre', codigo_postal = $this->_codigoPostal, id_provincia = $this->_idProvincia WHERE id_ciudad = $this->_idCiudad";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM ciudad WHERE id_ciudad = $this->_idCiudad";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public static function obtenerPorIdBarrio($idBarrio) {
        
        $sql = "SELECT barrio.id_barrio, ciudad.id_ciudad, ciudad.nombre, ciudad.codigo_postal, ciudad.id_provincia FROM barrio INNER JOIN ciudad ON barrio.id_ciudad = ciudad.id_ciudad WHERE id_barrio = " . $idBarrio;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $ciudad = new Ciudad($registro['nombre'], $registro['codigo_postal']);
        $ciudad->_idCiudad = $registro['id_ciudad'];
        $ciudad->_idBarrio = $registro['id_barrio'];
        $ciudad->_idProvincia = $registro['id_provincia'];
        $ciudad->setProvincia();

        return $ciudad;

    }

    public static function obtenerPorIdProvincia($idCiudad){
        $sql = "SELECT ciudad.id_ciudad,ciudad.nombre, ciudad.codigo_postal, ciudad.id_provincia FROM ciudad INNER JOIN provincia ON provincia.id_provincia = ciudad.id_provincia WHERE ciudad.id_provincia =". $idCiudad;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCiudad($datos);
        return $listado;
    } 


    public function _generarListadoCiudad($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $ciudad = self::_generarListaCiudad($registro);
            $listado[] = $ciudad;
            }
        return $listado;
    } 

    public function _generarListaCiudad($registro){
        $ciudad = new Ciudad($registro['nombre'], $registro['codigo_postal']);
        $ciudad->_idCiudad = $registro ['id_ciudad'];
        $ciudad->_idProvincia = $registro ['id_provincia'];
        $ciudad->setProvincia();
        return $ciudad;        
    }


    public function setProvincia() {
        $this->provincia = Provincia::obtenerPorIdCiudad($this->_idCiudad);
    }

    function comprobarExistenciaCiudad($nombre){
        $sql = "SELECT ciudad.nombre FROM ciudad WHERE nombre = '$nombre' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0 ) {
            $_SESSION['mensaje_error'] = "La ciudad ya existe en el sistema.";
            header('Location: ../alta.php');
            exit;
        } 
    }
     
}


?>