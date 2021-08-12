<?php

require_once 'Modulo.php';
require_once 'MySQL.php';


class Perfil {

	private $_idPerfil;
	private $_descripcion;
	private $_arrModulos;

	public function __construct($descripcion) {
		$this->_descripcion = $descripcion;
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

    public function guardar(){
        $sql = "INSERT INTO perfil (id_perfil, descripcion) VALUES (NULL, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfil = $idInsertado;
    }

    public function actualizar(){
        $sql = "UPDATE perfil SET descripcion = '$this->_descripcion' WHERE id_perfil = $this->_idPerfil";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar(){
        $sql = "DELETE FROM perfil WHERE id_perfil = $this->_idPerfil";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function eliminarModulos(){
        $sql = "DELETE FROM perfil_modulo WHERE id_perfil = $this->_idPerfil";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function obtenerTodos() {

        $sql = "SELECT * FROM perfil";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPerfiles($datos);

        return $listado;

    }

    private function _generarListadoPerfiles($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $perfil = new Perfil($registro['descripcion']);
            $perfil->_idPerfil = $registro['id_perfil'];
            $listado[] = $perfil;
        }
        return $listado;
    }

    public static function obtenerPorId($idPerfil) {
        $sql = "SELECT * FROM perfil WHERE id_perfil = " . $idPerfil;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $perfil = new Perfil($registro ['descripcion']);
        $perfil->_idPerfil = $registro ['id_perfil'];
        $perfil->_arrModulos = Modulo::obtenerModulosPorIdPerfil($perfil->_idPerfil);
        return $perfil;
    }

    public function getModulos() {
    	return $this->_arrModulos;
    }

    public function tieneModulo($idModulo){
        $sql = "SELECT * FROM perfil_modulo "
            . "WHERE id_modulo = $idModulo "
            . "AND id_perfil = $this->_idPerfil";
        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        return $result->num_rows > 0;
    }

    public function __toString() {
        return $this->_descripcion;
    }

    function comprobarExistenciaPerfil($descripcion){
        $sql = "SELECT perfil.descripcion FROM perfil WHERE descripcion = '$descripcion' ";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0 ) {
            $_SESSION['mensaje_error'] = "El perfil ya existe en el sistema.";
            header('Location: ../alta.php');
            exit;
        } 
    }


}

?>