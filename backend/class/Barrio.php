<?php 

require_once 'MySQL.php';

/**
 * 
 */
class Barrio {
	
	private $_idBarrio;
	private $_descripcion;

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


    public function guardar() {
        $sql = "INSERT INTO Barrio (id_barrio, descripcion) VALUES (NULL, $this->_descripcion)";

        //echo $sql;
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPersona = $idInsertado;
    }
     

   
}


?>