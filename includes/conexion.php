<?php class Conexion{
    private $servidor ="localhost";
    private $usuario ="root";
    private $pass = "root";
    private $conexionPdo;
    private $base = "proyecto_integrador_cac";
    
    public function __construct(){
        try{ 
            $this->conexionPdo = new PDO("mysql:host=$this->servidor;dbname=$this->base",$this->usuario,$this->pass);
            $this->conexionPdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){ 
            return "Falla de Conexión".$e;
        }
    }

    public function ejecutar($sql){
        $this->conexionPdo->exec($sql);
        return $this->conexionPdo->lastInsertId();
    }
    public function consultar($sql){ 
        $sentencia = $this->conexionPdo->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
} ?>