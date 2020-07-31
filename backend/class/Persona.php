<?php 

require_once 'Direccion.php';
require_once 'Contacto.php';
require_once 'MySQL.php';

/**
 * 
 */
class Persona {
	
	protected $_idPersona;

    public $direccion;

    public $arrContactos;


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


    public function guardar() {
        $sql = "INSERT INTO persona (id_persona) VALUES (NULL)";

        //echo $sql;
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPersona = $idInsertado;
    }

    public function setDireccion() {
        $this->direccion = Direccion::obtenerPorIdPersona($this->_idPersona);
    }

    public function setContactos() {
        $this->arrContactos = Contacto::obtenerPorIdPersona($this->_idPersona);
    }

     
}


?>