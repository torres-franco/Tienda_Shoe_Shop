<?php 

require_once 'Perfil.php';
require_once 'PersonaFisica.php';
require_once 'MySQL.php';


class Usuario extends PersonaFisica {
	
	private $_idUsuario;
	private $_user;
	private $_clave;
	private $_UltimaConexion;
    private $_idPerfil;
    private $_estaLogueado;
    private $_imagen;

    public $perfil;

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

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->_imagen;
    }

    /**
     * @param mixed $_imagen
     *
     * @return self
     */
    public function setImagen($_imagen)
    {
        $this->_imagen = $_imagen;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT u.id_usuario, u.id_perfil, u.user, u.clave, u.ultima_conexion, u.imagen, p.id_persona_fisica, p.id_persona, p.nombre, p.apellido, p.dni FROM usuario AS u JOIN personafisica AS p ON u.id_persona_fisica = p.id_persona_fisica WHERE id_usuario =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_idPersonaFisica = $registro['id_persona_fisica'];
        $usuario->_idPerfil = $registro['id_perfil'];
        $usuario->_user = $registro['user'];
        $usuario->_imagen = $registro['imagen'];

        $usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);
        //$usuario->_dni = $registro['dni'];


        return $usuario;


    }

    public function setPerfil() {
        $this->usuario = Perfil::obtenerPorId($this->_idPerfil);
    }


    public function obtenerTodo(){

        $sql = "SELECT personafisica.id_persona_fisica, personafisica.nombre, personafisica.apellido, personafisica.dni, usuario.id_usuario, usuario.user, usuario.ultima_conexion, usuario.imagen "
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
            //$usuario->_idPerfil = $registro['id_perfil'];
            $usuario->_user = $registro['user'];
            $usuario->_imagen = $registro['imagen'];
            //$usuario->_dni = $registro['dni'];

            $listado[] = $usuario;
        }

        return $listado;
    }

    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO usuario (id_usuario,id_persona_fisica,id_perfil,user, clave, imagen) VALUES (NULL, $this->_idPersonaFisica, $this->_idPerfil, '$this->_user', '$this->_clave', '$this->_imagen')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUsuario = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();
        $sql = "UPDATE usuario SET user = '$this->_user', imagen = '$this->_imagen', id_perfil = $this->_idPerfil "
        . "WHERE id_usuario = $this->_idUsuario";
    
        $mysql = new MySQL();
        $mysql->actualizar($sql);

        //echo $sql;
        //exit;

    }

    public static function login($user, $clave) {
        $sql = "SELECT * FROM usuario "
             . "INNER JOIN personafisica on personafisica.id_persona_fisica = usuario.id_persona_fisica "
             . "WHERE user = '$user' "
             . "AND clave = '$clave' "
             . "AND personafisica.estado = 1";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0) {
            $registro = $datos->fetch_assoc();
            $usuario = new Usuario($registro['nombre'], $registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_idPersonaFisica = $registro['id_persona_fisica'];
            $usuario->_user = $registro['user'];
            //$usuario->_dni = $registro['dni'];
            $usuario->_idPerfil = $registro['id_perfil'];
            $usuario->_UltimaConexion = $registro['ultima_conexion'];
            $usuario->_imagen = $registro['imagen'];
            $usuario->_estaLogueado = true;

            $usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);
            $usuario->setDireccion();
        } else {
            $usuario = new Usuario('', '');
            $usuario->_estaLogueado = false;
        }

        return $usuario;
    }

    public function __toString() {
        return $this->_user;
    }
    

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }

   
    public function EstaLogueado()
    {
        return $this->_estaLogueado;
    }
   

}




?>
