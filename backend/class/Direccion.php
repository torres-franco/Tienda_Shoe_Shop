<?php

require_once 'MySQL.php';
require_once 'Persona.php';

/**
 * 
 */
class Direccion {
	
	private $_idDireccion;
	private $_calle;
	private $_altura;
	private $_manzana;
	private $_torre;
	private $_piso;
	private $_numero_puerta;
	private $_sector;
	private $_referencia;


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

    public function obtenerTodo() {
        $sql = "SELECT direccion.id_direccion, direccion.calle, direccion.altura, direccion.manzana, direccion.torre, direccion.piso, direccion.numero_puerta, direccion.sector, direccion.referencia, persona.id_persona FROM direccion INNER JOIN persona ON direccion.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoDireccion($datos);

    return $listado;

    }

    private function _generarListadoDireccion($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $direccion = new Direccion();
            $direccion->_idDireccion = $registro['id_direccion'];
            $direccion->_idPersona = $registro['id_persona'];
            $direccion->_calle = $registro['calle'];
            $direccion->_altura = $registro['altura'];
            $direccion->_manzana = $registro['manzana'];
            $direccion->_torre = $registro['torre'];
            $direccion->_piso = $registro['piso'];
            $direccion->_numero_puerta = $registro['numero_puerta'];
            $direccion->_sector = $registro['sector'];
            $direccion->_referencia = $registro['referencia'];
            
            $listado[] = $direccion;

        }

        return $listado;
    }


    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO direccion (id_direccion, id_persona, calle, altura, manzana, torre, piso, numero_puerta, sector, referencia) VALUES (NULL, $this->_idPersona, '$this->_calle', '$this->_altura', '$this->_manzana', '$this->_torre', $this->_piso, $this->_numero_puerta, '$this->_sector', '$this->_referencia')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDireccion = $idInsertado;
    }

}

?>