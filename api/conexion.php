<?php
    abstract class Conexion{
        private $driver;
        private $host;
        private $bd;
        private $usu;
        private $pass;
        private $charset;

        //constructor que setea el nombre de la base de datos
        public function __construct(){
            $this->driver='mysql';
            $this->host='localhost';
            $this->bd='';
            $this->usu='root';
            $this->pass='';
            $this->charset='utf8';
        }
        //Funcion de que devuelve conexion
        protected function conectar(){
            try {
                $PDO = new PDO("mysql:host=localhost;dbname=proyec","root","1234");
                $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                return $PDO;
            } catch (PDOException $e) {
                echo "Error de  ".$e->getMessage();
            }
        }
    }
?>