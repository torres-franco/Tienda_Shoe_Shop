<?php

require_once 'MySQL.php';
require_once 'PersonaFisica.php';



class Cliente extends PersonaFisica {

	public $_idCliente;


    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->_idCliente;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM cliente AS c JOIN personafisica AS p ON c.id_persona_fisica = p.id_persona_fisica WHERE id_cliente =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $cliente = self::_generarCliente($data);
        return $cliente;


        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $cliente = new Cliente($registro['nombre'], $registro['apellido']);   
        $cliente->_idCliente = $registro['id_cliente'];
        $cliente->_idPersona = $registro['id_persona'];
        $cliente->_idPersonaFisica = $registro['id_persona_fisica'];
        $cliente->_dni = $registro['dni'];
        $cliente->_fechaNacimiento = $registro['fecha_nacimiento'];
        $cliente->_genero = $registro['genero'];

        return $cliente;


    }

    public static function obtenerTodos() {
    	$sql = "SELECT personafisica.id_persona_fisica, personafisica.nombre, personafisica.apellido, personafisica.dni, personafisica.fecha_nacimiento, personafisica.genero, cliente.id_cliente "
             . "FROM personafisica "
             . "INNER JOIN cliente ON cliente.id_persona_fisica = personafisica.id_persona_fisica";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoCliente($datos);

    	return $listado;

    }

    private function _generarCliente($data) {
        $cliente = new Cliente($data['nombre'], $data['apellido']);
        $cliente->_idCliente = $data['id_cliente'];
        $cliente->_idPersona = $data['id_persona'];
        $cliente->_idPersonaFisica = $data['id_persona_fisica'];
        $cliente->_dni = $data['dni'];
        $cliente->_fechaNacimiento = $data['fecha_nacimiento'];
        $cliente->_genero = $data['genero'];
        $cliente->setDireccion();
        $cliente->setContactos();
        
        return $cliente;
    }

    private function _generarListadoCliente($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$cliente = new Cliente($registro['nombre'], $registro['apellido']);
			$cliente->_idCliente = $registro['id_cliente'];
			$cliente->_idPersonaFisica = $registro['id_persona_fisica'];
			$cliente->_dni = $registro['dni'];
            $cliente->_fechaNacimiento = $registro['fecha_nacimiento'];
            $cliente->_genero= $registro['genero'];

			$listado[] = $cliente;
		}
		return $listado;
    }


    public static function obtenerPorIdPedido($idPedido) {
        
        $sql = "SELECT pedido.id_pedido, pedido.id_pedido_estado, cliente.id_cliente, personafisica.id_persona_fisica, personafisica.id_persona, personafisica.nombre, personafisica.apellido, personafisica.dni, personafisica.fecha_nacimiento, personafisica.genero FROM pedido 
            INNER JOIN cliente ON pedido.id_cliente = cliente.id_cliente
            INNER JOIN personafisica ON cliente.id_persona_fisica = personafisica.id_persona_fisica
            WHERE id_pedido = " . $idPedido;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        
        $cliente = new Cliente($registro['nombre'], $registro['apellido']);   
        $cliente->_idCliente = $registro['id_cliente'];
        $cliente->_idPersona = $registro['id_persona'];
        $cliente->_idPersonaFisica = $registro['id_persona_fisica'];
        $cliente->_dni = $registro['dni'];
        $cliente->_fechaNacimiento = $registro['fecha_nacimiento'];
        $cliente->_genero = $registro['genero'];
        $cliente->setDireccion();
        $cliente->setContactos();

        return $cliente;

    }

    


    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO cliente (id_cliente, id_persona_fisica) VALUES (NULL, $this->_idPersonaFisica)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCliente = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE cliente SET id_persona_fisica = $this->_idPersonaFisica WHERE id_cliente = $this->_idCliente";
        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }  
    
}


?>