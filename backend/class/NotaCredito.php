<?php 

require_once 'MySQL.php';
require_once 'Factura.php';
require_once 'Motivo.php';

/**
 * 
 */
class NotaCredito {
	
	private $_idNotaCredito;
	private $_idFactura;
    private $_fecha;
    private $_observacion;

    private $_idMotivo;

    //public $motivo;


    /**
     * @return mixed
     */
    public function getIdNotaCredito()
    {
        return $this->_idNotaCredito;
    }

    /**
     * @param mixed $_idNotaCredito
     *
     * @return self
     */
    public function setIdNotaCredito($_idNotaCredito)
    {
        $this->_idNotaCredito = $_idNotaCredito;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFactura()
    {
        return $this->_idFactura;
    }

    /**
     * @param mixed $_idFactura
     *
     * @return self
     */
    public function setIdFactura($_idFactura)
    {
        $this->_idFactura = $_idFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->_fecha;
    }

    /**
     * @param mixed $_fecha
     *
     * @return self
     */
    public function setFecha($_fecha)
    {
        $this->_fecha = $_fecha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->_observacion;
    }

    /**
     * @param mixed $_observacion
     *
     * @return self
     */
    public function setObservacion($_observacion)
    {
        $this->_observacion = $_observacion;

        return $this;
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

    
    public static function obtenerTodos() {
        $sql = "SELECT * FROM notacredito ORDER BY id_nota_credito DESC LIMIT 6";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoNotaCredito($datos);
        return $listado;
    }

    
    public static function obtenerPorId($idNotaCredito) {
        $sql = "SELECT * FROM notacredito WHERE id_nota_credito = ".$idNotaCredito;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $notaCredito = self::_generarListadoNotaCredito($datos);


        return $notaCredito;
    }

    public function _generarListadoNotaCredito($datos){
        $listado = array();
        while ($registro = $datos->fetch_assoc())
            {
            $notaCredito = self::_generarNotaCredito($registro);
            $listado[] = $notaCredito;
            }
        return $listado;
    }

    public function _generarNotaCredito ($registro){
        $notaCredito = new NotaCredito();
        $notaCredito->_idNotaCredito = $registro['id_nota_credito'];
        $notaCredito->_idFactura = $registro['id_factura'];
        $notaCredito->setFactura();
        $notaCredito->_fecha = $registro['fecha'];
        $notaCredito->_idMotivo = $registro['id_motivo'];
        $notaCredito->setMotivo();
        $notaCredito->_observacion = $registro['observacion'];

        return $notaCredito;
    }

    

    public function __toString() {
        return $this->_observacion;
    }  


    public function guardar() {

        $sql = "INSERT INTO notacredito (id_nota_credito, id_motivo, id_factura, fecha, observacion) VALUES (NULL, $this->_idMotivo, $this->_idFactura, '$this->_fecha', '$this->_observacion')";

    //echo $sql;
    //exit;


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idNotaCredito = $idInsertado;
    }

    public function setFactura() {
        $this->factura = Factura::obtenerPorIdNotaCredito($this->_idNotaCredito);
    }

    public function setMotivo() {
        $this->motivo = Motivo::obtenerPorIdNotaCredito($this->_idNotaCredito);
    }

}


?>