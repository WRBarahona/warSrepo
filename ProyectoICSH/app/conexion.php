<?php
include 'credenciales.php';
class Conexion{
    protected $conn;
    public function conexion() {
        $this->conn=new mysqli(SERVIDOR,USUARIO,CONTRA,BASEDATOS);
        $this->conn->set_charset("utf8");
    }
    public function deconectar() {
        $this->conn->close();
    }
    
    public function consultar($sql){
        $this->conexion();
        $res = $this->conn->query($sql);
        $this->deconectar();
        return $res;
    }
    
    public function ejecutar($sql){
        $this->conexion();
        $this->conn->query($sql);
        $this->deconectar();
        return true;
    }
    
    
}
 
