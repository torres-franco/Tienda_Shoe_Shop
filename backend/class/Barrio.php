<?php 

require_once 'MySQL.php';
require_once 'Ciudad.php';

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

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM barrio WHERE id_barrio =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $barrio = new Barrio($registro['descripcion']);
        $barrio->_idBarrio = $registro['id_barrio'];
        $barrio->_idCiudad = $registro['id_ciudad'];
        $barrio->setCiudad();

        return $barrio;


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

    public function actualizar() {
        
        $sql = "UPDATE barrio SET descripcion = '$this->_descripcion', id_ciudad = $this->_idCiudad WHERE id_barrio = $this->_idBarrio";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM barrio WHERE id_barrio = $this->_idBarrio";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public static function obtenerPorIdDireccion($idDireccion) {
        
        $sql = "SELECT barrio.id_barrio, barrio.id_ciudad, direccion.id_direccion, barrio.descripcion FROM direccion INNER JOIN barrio ON direccion.id_barrio = barrio.id_barrio WHERE id_direccion =" . $idDireccion;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $barrio = new Barrio($registro['descripcion']);   
        $barrio->_idBarrio = $registro['id_barrio'];
        $barrio->_idCiudad = $registro['id_ciudad'];
        $barrio->setCiudad();

        return $barrio;

    }

    public static function obtenerPorIdCiudad($id){
        $sql = "SELECT barrio.id_barrio, barrio.descripcion, barrio.id_ciudad FROM barrio INNER JOIN ciudad ON ciudad.id_ciudad = barrio.id_ciudad WHERE barrio.id_ciudad =". $id ;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoBarrio($datos);
        return $listado;
    } 


    public function _generarListadoBarrio($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $barrio = new Barrio ($registro['descripcion']);
            $barrio->_descripcion = $registro['descripcion'];
            $barrio->_idBarrio = $registro['id_barrio'];
            $barrio->_idCiudad = $registro['id_ciudad'];
            $barrio->setCiudad();
            $listado[] = $barrio;
            }
        return $listado;
    }

    public function setCiudad() {
        $this->ciudad = Ciudad::obtenerPorIdBarrio($this->_idBarrio);
    }

    function comprobarExistenciaBarrio($descripcion){
        $sql = "SELECT barrio.descripcion FROM barrio WHERE descripcion = '$descripcion' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0 ) {
            $_SESSION['mensaje_error'] = "El barrio ya existe en el sistema.";
            header('Location: ../alta.php');
            exit;
        } 
    }



}


?>