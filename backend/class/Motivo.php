<?php

require_once 'MySQL.php';


class Motivo {

    private $_idMotivo;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

    
    /**
     * @return mixed
     */
    public function getIdMotivo()
    {
        return $this->_idMotivo;
    }

    /**
     * @param mixed $_idMotivo
     *
     * @return self
     */
    public function setIdMotivo($_idMotivo)
    {
        $this->_idMotivo = $_idMotivo;

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

     

    public static function obtenerTodos() {
        $sql = "SELECT * FROM motivo";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $motivo = new Motivo($registro['descripcion']);
            $motivo->_idMotivo = $registro['id_motivo'];
            $listado[] = $motivo;
        }
        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM motivo WHERE id_motivo =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

       //$encontrado = self::_generarListadoId($datos);

        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $motivo = new Motivo($registro['descripcion']);
        $motivo->_idMotivo = $registro['id_motivo'];

        return $motivo;


    }

    public static function obtenerPorIdNotaCredito($idNotaCredito) {
        
        $sql = "SELECT * FROM notacredito 
        INNER JOIN motivo ON notacredito.id_motivo = motivo.id_motivo
        WHERE id_nota_credito = " . $idNotaCredito;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $motivo = new Motivo($registro['descripcion']);   
        $motivo->_idMotivo = $registro['id_motivo'];
        $motivo->_idNotaCredito = $registro['id_nota_credito'];

        return $motivo;

    }

    public function __toString() {
        return $this->_descripcion;
    }


    public function guardar() {

    $sql = "INSERT INTO motivo (id_motivo, descripcion) VALUES (NULL, '$this->_descripcion')";

    $mysql = new MySQL();
    $idInsertado = $mysql->insertar($sql);

    $this->_idColor = $idInsertado;

    }

    /*

    public function actualizar() {
        
        $sql = "UPDATE color SET descripcion = '$this->_descripcion' WHERE id_color = $this->_idColor";
        

        $mysql = new MySQL();
        $mysql->actualizar($sql);


    }

    public function eliminar(){
        $sql = "DELETE FROM color WHERE id_color = $this->_idColor";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }*/

  
}


?>