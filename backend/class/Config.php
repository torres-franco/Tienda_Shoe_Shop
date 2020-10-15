<?php
    class Connection{

        private $_conn;
        private $servername;
        private $username;
        private $password;
        private $dbname;

        public function __construct(){
            $this->servername = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->dbname = 'shoe_shop';
            
        }

        private function conectar(){
            $this->_conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        private function desconectar(){
            $this->_conn->close();
        }

        public function consultar($query){
            $this->conectar();
            $datos = $this->_conn->query($query);
            $this->desconectar();
            return $datos;
        }

        public function insertar($query){
            $this->conectar();
            $datos = $this->_conn->query($query);
            $last_id = $conn->insert_id;
            $this->desconectar();
            return $last_id;
        }

    }

?>