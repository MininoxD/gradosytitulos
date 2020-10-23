<?php
    require_once('conexion.php');
    class Cu_expediente extends Conexion{
        private $nro_cu;
        private $id_expediente;
        private $estado;
        private $observacion;
        private $pdo;


        public function __construct(){
            //setear  conexion desde la clase conexion
            $this->pdo = parent::conectar();
        }


        public function listar_todo_cu(){
          $stm = $this->pdo->prepare("SELECT * FROM cu_expediente WHERE nro_cu = ?");
          $stm->execute(array($this->nro_cu));
          return $stm->fetchall(PDO::FETCH_OBJ);
        }

        public function listar_todo_cu(){
            $stm = $this->pdo->prepare("SELECT * FROM cu_expediente WHERE nro_cu = ? and estado=?");
            $stm->execute(array($this->nro_cu,$this->estado));
            return $stm->fetchall(PDO::FETCH_OBJ);
        }

        public function insertar(){
            $stm = $this->pdo->prepare("INSERT INTO cu_expediente (nro_cu, id_expediente,estado,observacion) VALUES (?,?,?,?)");
            if($stm->execute(array($this->nro_cu,$this->id_expediente,$this->estado,$this->observacion))){
              return 1;
            }else {
              return 0;
            }
        }

        public function eliminar(){
            $stm = $this->pdo->prepare("DELETE FROM cu_expediente WHERE nro_cu=? and id_expediente=? ");
            if($stm->execute(array($this->nro_cu,$this->id_expediente))){
              return 1;
            }else {
              return 0;
            }
          }



        public function getNroCu()
        {
            return $this->nro_cu;
        }
            
            
        public function setNroCu($nro_cu)
        {
            $this->nro_cu = $nro_cu;
            
        }
            
                    
        public function getIdExpediente()
        {
            return $this->id_expediente;
        }
            
            
        public function setIdExpediente($id_expediente)
        {
            $this->id_expediente = $id_expediente;
            
        }
            
                    
        public function getEstado()
        {
            return $this->estado;
        }
            
            
        public function setEstado($estado)
        {
            $this->estado = $estado;
            
        }
            
                    
        public function getObservacion()
        {
            return $this->observacion;
        }
            
            
        public function setObservacion($observacion)
        {
            $this->observacion = $observacion;
            
        }
    }
?>