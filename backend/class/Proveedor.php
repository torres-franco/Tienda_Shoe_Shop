<?php

require_once 'MySQL.php';
require_once 'Persona.php';


class Proveedor extends Persona {

	private $_idProveedor;
	private $_cuit;
	private $_razon_social;
	
    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->_cuit;
    }

    /**
     * @param mixed $_cuit
     *
     * @return self
     */
    public function setCuit($_cuit)
    {
        $this->_cuit = $_cuit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->_razon_social;
    }

    /**
     * @param mixed $_razon_social
     *
     * @return self
     */
    public function setRazonSocial($_razon_social)
    {
        $this->_razon_social = $_razon_social;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->_idProveedor;
    }

    /**
     * @param mixed $_idProveedor
     *
     * @return self
     */
    public function setIdProveedor($_idProveedor)
    {
        $this->_idProveedor = $_idProveedor;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM proveedor AS pro JOIN persona AS p ON pro.id_persona = p.id_persona WHERE id_proveedor =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $proveedor = new Proveedor();
        $proveedor->_idProveedor = $registro['id_proveedor'];
        $proveedor->_idPersona = $registro['id_persona'];
        $proveedor->_cuit = $registro['cuit'];
        $proveedor->_razon_social = $registro['razon_social'];

        return $proveedor;


    }


    public function obtenerProveedor(){

    	$sql = "select * from proveedor INNER JOIN persona ON proveedor.id_persona = persona.id_persona";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoProveedor($datos);

    	return $listado;

    }

    private function _generarListadoProveedor($datos){
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$proveedor = new Proveedor();
			$proveedor->_idProveedor = $registro['id_proveedor'];
			$proveedor->_idPersona = $registro['id_persona'];
			$proveedor->_razon_social = $registro['razon_social'];
			$proveedor->_cuit = $registro['cuit'];

			$listado[] = $proveedor;
    	}

    	return $listado;
    }

    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO proveedor (id_proveedor, id_persona, razon_social, cuit) VALUES (NULL, $this->_idPersona, '$this->_razon_social', '$this->_cuit')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idProveedor = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE proveedor SET razon_social = '$this->_razon_social', cuit = '$this->_cuit' WHERE id_proveedor = $this->_idProveedor";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

}

?>