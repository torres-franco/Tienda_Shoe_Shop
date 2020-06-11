<?php 

require_once 'MySQL.php';

/**
 * 
 */
class Persona {
	
	protected $_idPersona;


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

    /*public function obtenerDireccion() {
        $sql = "SELECT * FROM persona INNER JOIN direccion ON direccion.id_direccion = persona.id_persona WHERE id_direccion";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
    }*/

     
}


?>