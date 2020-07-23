<<<<<<< HEAD
<?php

require_once 'MySQL.php';
require_once 'Provincia.php';

/**
 * 
 */
class Direccion {
	
	private $_idDireccion;
	private $_calle;
	private $_altura;
	private $_manzana;
	private $_piso;
    private $_idBarrio;
    private $_idPersona;


    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->_idDireccion;
    }

    /**
     * @param mixed $_idDireccion
     *
     * @return self
     */
    public function setIdDireccion($_idDireccion)
    {
        $this->_idDireccion = $_idDireccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->_altura;
    }

    /**
     * @param mixed $_altura
     *
     * @return self
     */
    public function setAltura($_altura)
    {
        $this->_altura = $_altura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManzana()
    {
        return $this->_manzana;
    }

    /**
     * @param mixed $_manzana
     *
     * @return self
     */
    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTorre()
    {
        return $this->_torre;
    }

    /**
     * @param mixed $_torre
     *
     * @return self
     */
    public function setTorre($_torre)
    {
        $this->_torre = $_torre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->_piso;
    }

    /**
     * @param mixed $_piso
     *
     * @return self
     */
    public function setPiso($_piso)
    {
        $this->_piso = $_piso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroPuerta()
    {
        return $this->_numero_puerta;
    }

    /**
     * @param mixed $_numero_puerta
     *
     * @return self
     */
    public function setNumeroPuerta($_numero_puerta)
    {
        $this->_numero_puerta = $_numero_puerta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSector()
    {
        return $this->_sector;
    }

    /**
     * @param mixed $_sector
     *
     * @return self
     */
    public function setSector($_sector)
    {
        $this->_sector = $_sector;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->_referencia;
    }

    /**
     * @param mixed $_referencia
     *
     * @return self
     */
    public function setReferencia($_referencia)
    {
        $this->_referencia = $_referencia;

        return $this;
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

    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT * FROM direccion WHERE id_persona = " . $idPersona;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $direccion = null;

        if ($datos->num_rows > 0) {
            $direccion = new Direccion();
            $direccion->_idDireccion = $data['id_direccion'];
            $direccion->_calle = $data['calle'];
            $direccion->_altura = $data['altura'];
            $direccion->_piso = $data['piso'];
            $direccion->_manzana = $data['manzana'];
            $direccion->_idBarrio = $data['id_barrio'];
            $direccion->_idPersona = $data['id_persona'];
    
        }

        return $direccion;
    }


    public function guardar() {


        $sql = "INSERT INTO direccion (id_direccion, calle, altura, piso, manzana, id_barrio, id_persona) "
            . "VALUES (NULL, '$this->_calle','$this->_altura', '$this->_piso','$this->_manzana', $this->_idBarrio, $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDireccion = $idInsertado;
    }

    public function actualizar(){

        $sql = "UPDATE direccion SET calle = '$this->_calle', altura = '$this->_altura', piso = '$this->_piso', manzana = '$this->_manzana', id_barrio = $this->_idBarrio"
        ." WHERE id_direccion = $this->_idDireccion";

        //echo $sql;
        //exit;
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }


    public function __toString(){
        return $this->_calle . " " . $this->_altura;
    }


    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

}

=======
<?php

require_once 'MySQL.php';

/**
 * 
 */
class Direccion {
	
	private $_idDireccion;
	private $_calle;
	private $_altura;
	private $_manzana;
	private $_piso;
    private $_idBarrio;
    private $_idPersona;


    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->_idDireccion;
    }

    /**
     * @param mixed $_idDireccion
     *
     * @return self
     */
    public function setIdDireccion($_idDireccion)
    {
        $this->_idDireccion = $_idDireccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->_altura;
    }

    /**
     * @param mixed $_altura
     *
     * @return self
     */
    public function setAltura($_altura)
    {
        $this->_altura = $_altura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManzana()
    {
        return $this->_manzana;
    }

    /**
     * @param mixed $_manzana
     *
     * @return self
     */
    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTorre()
    {
        return $this->_torre;
    }

    /**
     * @param mixed $_torre
     *
     * @return self
     */
    public function setTorre($_torre)
    {
        $this->_torre = $_torre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPiso()
    {
        return $this->_piso;
    }

    /**
     * @param mixed $_piso
     *
     * @return self
     */
    public function setPiso($_piso)
    {
        $this->_piso = $_piso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroPuerta()
    {
        return $this->_numero_puerta;
    }

    /**
     * @param mixed $_numero_puerta
     *
     * @return self
     */
    public function setNumeroPuerta($_numero_puerta)
    {
        $this->_numero_puerta = $_numero_puerta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSector()
    {
        return $this->_sector;
    }

    /**
     * @param mixed $_sector
     *
     * @return self
     */
    public function setSector($_sector)
    {
        $this->_sector = $_sector;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->_referencia;
    }

    /**
     * @param mixed $_referencia
     *
     * @return self
     */
    public function setReferencia($_referencia)
    {
        $this->_referencia = $_referencia;

        return $this;
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

    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT * FROM direccion WHERE id_persona = " . $idPersona;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $direccion = null;

        if ($datos->num_rows > 0) {
            $direccion = new Direccion();
            $direccion->_idDireccion = $data['id_direccion'];
            $direccion->_calle = $data['calle'];
            $direccion->_altura = $data['altura'];
            $direccion->_piso = $data['piso'];
            $direccion->_manzana = $data['manzana'];
            $direccion->_idBarrio = $data['id_barrio'];
            $direccion->_idPersona = $data['id_persona'];
        }

        return $direccion;
    }

    public function guardar() {


        $sql = "INSERT INTO direccion (id_direccion, calle, altura, piso, manzana, id_barrio, id_persona) "
            . "VALUES (NULL, '$this->_calle','$this->_altura', '$this->_piso','$this->_manzana', $this->_idBarrio, $this->_idPersona)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDireccion = $idInsertado;
    }

    public function actualizar(){

        $sql = "UPDATE direccion SET calle = '$this->_calle', altura = '$this->_altura', piso = '$this->_piso', manzana = '$this->_manzana', id_barrio = $this->_idBarrio"
        ." WHERE id_direccion = $this->_idDireccion";

        //echo $sql;
        //exit;
        $mysql = new MySQL();
        $mysql->actualizar($sql);

    }


    public function __toString(){
        return $this->_calle . " " . $this->_altura;
    }


    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }
}

>>>>>>> 64b49fd275f3fb3284e1547287effcf2c11d1653
?>