<?php

require_once 'MySQL.php';
require_once 'Persona.php';


class PersonaFisica extends Persona{

    protected $_idPersonaFisica;
    protected $_nombre;
    protected $_apellido;
    protected $_dni;
    protected $_fechaNacimiento;
    protected $_genero;
    protected $_estado;

    const ACTIVO = 1;

    public function __construct($nombre, $apellido) {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_estado = self::ACTIVO;
    }

    /**
     * @return mixed
     */
    public function getIdPersonaFisica()
    {
        return $this->_idPersonaFisica;
    }

    /**
     * @param mixed $_idPersonaFisica
     *
     * @return self
     */
    public function setIdPersonaFisica($_idPersonaFisica)
    {
        $this->_idPersonaFisica = $_idPersonaFisica;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->_apellido;
    }

    /**
     * @param mixed $_apellido
     *
     * @return self
     */
    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->_dni;
    }

    /**
     * @param mixed $_dni
     *
     * @return self
     */
    public function setDni($_dni)
    {
        $this->_dni = $_dni;

        return $this;
    }

    /**
     * @param mixed $_fechaNacimiento
     *
     * @return self
     */
    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->_genero;
    }

    /**
     * @param mixed $_genero
     *
     * @return self
     */
    public function setGenero($_genero)
    {
        $this->_genero = $_genero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }
    
    public function obtenerPersona() {
        $sql = "SELECT * FROM personafisica"
        . " INNER JOIN persona ON personafisica.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();
    }

    

    public function guardar() {
        parent::guardar();
        $sql = "INSERT INTO personafisica (id_persona_fisica,id_persona,nombre,apellido,dni, fecha_nacimiento, genero) VALUES (NULL, $this->_idPersona, '$this->_nombre','$this->_apellido', '$this->_dni', '$this->_fechaNacimiento', '$this->_genero')";

        //echo $sql;
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPersonaFisica = $idInsertado;

    }

    public function actualizar() {
        $sql = "UPDATE personafisica SET nombre = '$this->_nombre', apellido = '$this->_apellido', "
        . "dni = '$this->_dni', "
        . "fecha_nacimiento = '$this->_fechaNacimiento', genero = '$this->_genero' "
        . "WHERE id_persona_fisica = $this->_idPersonaFisica";
    
        $mysql = new MySQL();
        $mysql->actualizar($sql);

        //echo $sql;

    }

    /*public function eliminar() {
        $sql = "DELETE FROM Persona WHERE id_persona = $this->_idPersona";

        $mysql = new MySQL();
        $mysql->eliminar($sql);

    }*/

    public function __toString() {
        return $this->_nombre . " " . $this->_apellido;
    }



}


?>