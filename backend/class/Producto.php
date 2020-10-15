<?php

require_once 'MySQL.php';
require_once 'Marca.php';
require_once 'Categoria.php';
require_once 'Color.php';
require_once 'Talle.php';
//require_once 'Config.php';

/**
  * 
  */
 class Producto {
	
	public $_idProducto;
	public $_precio;
	public $_stockActual;
    public $_idMarca;
	public $_stockMinimo;
	public $_descripcion;
	public $_idCategoria;
	public $_idTalle;
	public $_idColor;

    public $marca; /*clase Marca*/
    public $categoria; /*clase Categoria*/
    public $color; /*clase color*/
    public $talle; /*clase talle*/

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->_idProducto;
    }

    /**
     * @param mixed $_idProducto
     *
     * @return self
     */
    public function setIdProducto($_idProducto)
    {
        $this->_idProducto = $_idProducto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockActual()
    {
        return $this->_stockActual;
    }

    /**
     * @param mixed $_stockActual
     *
     * @return self
     */
    public function setStockActual($_stockActual)
    {
        $this->_stockActual = $_stockActual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMinimo()
    {
        return $this->_stockMinimo;
    }

    /**
     * @param mixed $_stockMinimo
     *
     * @return self
     */
    public function setStockMinimo($_stockMinimo)
    {
        $this->_stockMinimo = $_stockMinimo;

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
    

    

    /**
     * @return mixed
     */
    public function getIdTalle()
    {
        return $this->_idTalle;
    }

    /**
     * @param mixed $_idTalle
     *
     * @return self
     */
    public function setIdTalle($_idTalle)
    {
        $this->_idTalle = $_idTalle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdColor()
    {
        return $this->_idColor;
    }

    /**
     * @param mixed $_idColor
     *
     * @return self
     */
    public function setIdColor($_idColor)
    {
        $this->_idColor = $_idColor;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM producto WHERE id_producto =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();

        //highlight_string(var_export($registro, true));

        //exit();

        $producto = new Producto();
        $producto->_idProducto = $registro['id_producto'];
        $producto->_idMarca = $registro['id_marca'];
        $producto->setMarca();
        $producto->_idCategoria = $registro['id_categoria'];
        $producto->setCategoria();
        $producto->_idColor = $registro['id_color'];
        $producto->setColor();
        $producto->_idTalle = $registro['id_talle'];
        $producto->setTalle();
        $producto->_descripcion = $registro['descripcion'];
        $producto->_precio = $registro['precio'];
        $producto->_stockActual = $registro['stock_actual'];
        $producto->_stockMinimo = $registro['stock_minimo'];

        return $producto;


    }


    public static function obtenerTodo() {
    	$sql = "SELECT * FROM producto";

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoProducto($datos);

    	return $listado;

    }

    private function _generarListadoProducto($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$producto = new Producto();
			$producto->_idProducto = $registro['id_producto'];
            $producto->_idMarca = $registro['id_marca'];
			$producto->setMarca();
            $producto->_idCategoria = $registro['id_categoria'];
            $producto->setCategoria();
            $producto->_idColor = $registro['id_color'];
            $producto->setColor();
            $producto->_idTalle = $registro['id_talle'];
            $producto->setTalle();
            $producto->_descripcion = $registro['descripcion'];
			$producto->_precio = $registro['precio'];
			$producto->_stockActual = $registro['stock_actual'];
			$producto->_stockMinimo = $registro['stock_minimo'];

			$listado[] = $producto;
		}
		return $listado;
    }

    public static function obtenerPorIdPedidoDetalle($idPedidoDetalle) {
        
        $sql = "SELECT pedidodetalle.id_pedido_detalle, producto.id_producto, producto.descripcion, producto.precio FROM pedidoDetalle INNER JOIN producto ON pedidoDetalle.id_producto = producto.id_producto WHERE id_pedido_detalle = " . $idPedidoDetalle;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $producto = new Producto();   
        $producto->_idProducto = $registro['id_producto'];
        $producto->_idPedidoDetalle = $registro['id_pedido_detalle'];
        $producto->_idMarca = $registro['id_marca'];
        $producto->setMarca();
        $producto->_idCategoria = $registro['id_categoria'];
        $producto->setCategoria();
        $producto->_idColor = $registro['id_color'];
        $producto->setColor();
        $producto->_idTalle = $registro['id_talle'];
        $producto->setTalle();
        $producto->_precio = $registro['precio'];
        $producto->_descripcion = $registro['descripcion'];

        return $producto;

    }


    public function guardar() {

        $sql = "INSERT INTO producto (id_producto, id_categoria, id_marca, id_talle, id_color, descripcion, precio, stock_actual, stock_minimo) "
             . "VALUES (NULL, $this->_idCategoria, $this->_idMarca, $this->_idTalle, $this->_idColor, '$this->_descripcion', '$this->_precio', '$this->_stockActual', '$this->_stockMinimo')";

        //echo $sql;
        //exit;

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idProducto = $idInsertado;
    }

    public function actualizar() {
        
        $sql = "UPDATE producto SET precio = $this->_precio, stock_actual = $this->_stockActual, stock_minimo = $this->_stockMinimo, descripcion = '$this->_descripcion', id_marca = $this->_idMarca, id_categoria = $this->_idCategoria, id_talle = $this->_idTalle, id_color = $this->_idColor"
        ." WHERE id_producto = $this->_idProducto";
        
        //echo $sql;
        //exit;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;

    }

    public function setMarca() {
        $this->marca = Marca::obtenerPorIdProducto($this->_idProducto);
    }

    public function setCategoria() {
        $this->categoria = Categoria::obtenerPorIdProducto($this->_idProducto);
    }

    public function setColor() {
        $this->color = Color::obtenerPorIdProducto($this->_idProducto);
    }

    public function setTalle() {
        $this->talle = Talle::obtenerPorIdProducto($this->_idProducto);
    }

    public function __toString() {
        return $this->_descripcion;
    }
    

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->_idMarca;
    }

    /**
     * @param mixed $_idMarca
     *
     * @return self
     */
    public function setIdMarca($_idMarca)
    {
        $this->_idMarca = $_idMarca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }

    /**
     * @param mixed $_idCategoria
     *
     * @return self
     */
    public function setIdCategoria($_idCategoria)
    {
        $this->_idCategoria = $_idCategoria;

        return $this;
    }

    
    public function buscarPorDescripcion($descripcion){
        /*
        obtiene todos los productos para el listado
        */
        $sql = "SELECT * FROM producto WHERE descripcion LIKE '% ".$descripcion." %'";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoProducto($datos);

        return $listado;
    }

    /*public function consultarStock(){
        $sql = "";
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

    }*/


}


?>