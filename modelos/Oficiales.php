<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Oficiales extends Conexion{
    public $offi_id;
    public $offi_grado;
    public $offi_arma;
    public $offi_nombre;
    public $offi_apellido;
    public $offi_situacion;

    public function __construct($args = [] )
    {
        $this->offi_id = $args['offi_id'] ?? null;
        $this->offi_grado = $args['offi_grado'] ?? '';
        $this->offi_arma = $args['offi_arma'] ?? '';
        $this->offi_nombre = $args['offi_nombre'] ?? '';
        $this->offi_apellido = $args['offi_apellido'] ?? '';
        $this->offi_situacion = $args['offi_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO oficiales (offi_grado, offi_arma, offi_nombre, offi_apellido) VALUES ('$this->offi_grado', '$this->offi_arma', '$this->offi_nombre', '$this->offi_apellido')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM oficiales WHERE offi_situacion = 1";

        if($this->offi_grado != ''){
            $sql .= " AND offi_grado LIKE '%$this->offi_grado%'";
        }

        if($this->offi_arma != ''){
            $sql .= " AND offi_arma LIKE '%$this->offi_arma%'";
        }

        if($this->offi_nombre != ''){
            $sql .= " AND offi_nombre LIKE '%$this->offi_nombre%'";
        }

        if($this->offi_apellido != ''){
            $sql .= " AND offi_apellido LIKE '%$this->offi_apellido%'";
        }

        if($this->offi_id != null){
            $sql .= " AND offi_id = $this->offi_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE oficiales SET offi_grado = '$this->offi_grado', offi_arma = '$this->offi_arma', offi_nombre = '$this->offi_nombre', offi_apellido = '$this->offi_apellido' WHERE offi_id = $this->offi_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE oficiales SET offi_situacion = 0 WHERE offi_id = $this->offi_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
