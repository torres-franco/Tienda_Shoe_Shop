<?php

require_once 'MySQL.php';

class TipoContacto {

    private $_idTipoContacto;
	private $_descripcion;


    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

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


    public function obtenerTodo(){

        $sql = "SELECT * FROM tipocontacto";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);

        /*echo $datos->num_rows;

        highlight_string(var_export($datos, true));


    }

}*/
        $mysql->desconectar();

        $listado = self::_generarListado($datos);

        return $listado;

    }

     private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $tipocontacto = new TipoContacto();
            $tipocontacto->_idTipoContacto = $registro['id_tipo_contacto'];
            $tipocontacto->_descripcion = $registro['descripcion'];
            $listado[] = $tipocontacto;
        }
        return $listado;
    }    

    public function __toString() {
    	return $this->_descripcion;
    }

    /*public function guardar() {

        $sql = "INSERT INTO tipocontacto_persona (id_tipo_contacto_persona, id_tipo_contacto, id_persona, valor) VALUES (NULL, $this->_idTipoContacto, $this->_idPersona, '$this->_valor')";

        echo $sql;
        exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTipoContactoPersona = $idInsertado;
    }*/

}


?>