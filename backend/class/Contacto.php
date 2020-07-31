<?php

require_once 'MySQL.php';
require_once 'TipoContacto.php';

class Contacto {

	private $_idTipoContactoPersona;
    private $_idTipoContacto;
	private $_idPersona;
	private $_valor;

	private $_descripcion;


    /**
     * @return mixed
     */
    public function getIdTipoContactoPersona()
    {
        return $this->_idTipoContactoPersona;
    }

    /**
     * @param mixed $_idTipoContactoPersona
     *
     * @return self
     */
    public function setIdTipoContactoPersona($_idTipoContactoPersona)
    {
        $this->_idTipoContactoPersona = $_idTipoContactoPersona;

        return $this;
    }

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

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->_valor;
    }

    /**
     * @param mixed $_valor
     *
     * @return self
     */
    public function setValor($_valor)
    {
        $this->_valor = $_valor;

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


    public function obtenerPorId($id){

        $sql = "SELECT * FROM tipocontacto_persona WHERE id_tipo_contacto_persona =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $contacto = new Contacto();
        $contacto->_idTipoContactoPersona = $registro['id_tipo_contacto_persona'];
        $contacto->_idTipoContacto = $registro['id_tipo_contacto'];
        $contacto->_idPersona = $registro['id_persona'];
        $contacto->_valor = $registro['valor'];

        return $contacto;


    }  
    

    public static function obtenerPorIdPersona($idPersona) {
    	$sql = "SELECT tipocontacto_persona.id_tipo_contacto_persona, tipocontacto_persona.id_persona, tipocontacto_persona.id_tipo_contacto, tipocontacto_persona.valor, tipocontacto.descripcion FROM tipocontacto_persona INNER JOIN tipocontacto on tipocontacto.id_tipo_contacto = tipocontacto_persona.id_tipo_contacto WHERE tipocontacto_persona.id_persona = " .  $idPersona;

        //echo $sql;
        //exit;

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoContactos($datos);
    	return $listado;    	
    }

    private function _generarListadoContactos($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$contacto = new Contacto();
			$contacto->_idTipoContactoPersona = $registro['id_tipo_contacto_persona'];
            $contacto->_idTipoContacto = $registro['id_tipo_contacto'];
            $contacto->_idPersona = $registro['id_persona'];
			$contacto->_valor = $registro['valor'];
			$contacto->_descripcion = $registro['descripcion'];
			$listado[] = $contacto;
		}
		return $listado;
    }

    public function __toString() {
    	return $this->_descripcion .  ": " .  $this->_valor;
    }

    public function guardar() {

        $sql = "INSERT INTO tipocontacto_persona (id_tipo_contacto_persona, id_tipo_contacto, id_persona, valor) VALUES (NULL, $this->_idTipoContacto, $this->_idPersona, '$this->_valor')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idTipoContactoPersona = $idInsertado;
    }

    public function eliminar(){
        $sql = "DELETE FROM tipocontacto_persona WHERE id_tipo_contacto_persona = $this->_idTipoContactoPersona";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }



}


?>