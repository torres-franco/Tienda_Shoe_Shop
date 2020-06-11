<?php 

require_once 'PersonaFisica.php';
require_once 'MySQL.php';


class Usuario extends PersonaFisica {
	
	private $_idUsuario;
	private $_user;
	private $_clave;
	private $_UltimaConexion;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @param mixed $_user
     *
     * @return self
     */
    public function setUser($_user)
    {
        $this->_user = $_user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->_clave;
    }

    /**
     * @param mixed $_clave
     *
     * @return self
     */
    public function setClave($_clave)
    {
        $this->_clave = $_clave;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUltimaConexion()
    {
        return $this->_UltimaConexion;
    }

    /**
     * @param mixed $_UltimaConexion
     *
     * @return self
     */
    public function setUltimaConexion($_UltimaConexion)
    {
        $this->_UltimaConexion = $_UltimaConexion;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM usuario AS u JOIN personafisica AS p ON u.id_persona_fisica = p.id_persona_fisica WHERE id_usuario =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_idPersonaFisica = $registro['id_persona_fisica'];
        $usuario->_dni = $registro['dni'];
        $usuario->_user = $registro['user'];


        return $usuario;


    }

    public function obtenerTodo(){

        $sql = "SELECT personafisica.id_persona_fisica, personafisica.nombre, personafisica.apellido, personafisica.dni, usuario.id_usuario, usuario.user, usuario.ultima_conexion "
             . "FROM personafisica "
             . "INNER JOIN usuario ON usuario.id_persona_fisica = personafisica.id_persona_fisica";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);

        /*echo $datos->num_rows;

        highlight_string(var_export($datos, true));


    }

}*/
        $mysql->desconectar();

        $listado = self::_generarListadoUsuario($datos);

        return $listado;

    }

    private function _generarListadoUsuario($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $usuario = new Usuario($registro['nombre'], $registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];
            $usuario->_idPersonaFisica = $registro['id_persona_fisica'];
            $usuario->_user = $registro['user'];
            $usuario->_dni = $registro['dni'];

            $listado[] = $usuario;
        }

        return $listado;
    }

    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO usuario (id_usuario,id_persona_fisica, user, clave) VALUES (NULL, $this->_idPersonaFisica, '$this->_user', '$this->_clave')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUsuario = $idUsuario;
    }

    public function actualizar() {
        parent::actualizar();
        $sql = "UPDATE usuario SET user = '$this->_user' "
        . "WHERE id_usuario = $this->_idUsuario";
    
        $mysql = new MySQL();
        $mysql->actualizar($sql);

        //echo $sql;

    }
    
}




?>