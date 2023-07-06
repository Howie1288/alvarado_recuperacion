<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Problemas extends Conexion{
    public $prob_id;
    public $prob_apli_id ;
    public $prob_descripcion;
    public $prob_estado;
    public $prob_fecha;
    public $prob_situacion;

    public function __construct($args = [])
    {
        $this->prob_id = $args['prob_id'] ?? null;
        $this->prob_apli_id = $args['prob_apli_id'] ?? null;
        $this->prob_descripcion = $args['prob_descripcion'] ?? '';
        $this->prob_estado = $args['prob_estado'] ?? '';
        $this->prob_fecha = $args['prob_fecha'] ?? '';
        $this->prob_situacion = $args['prob_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO problemas (prob_apli_id, prob_descripcion, prob_estado, prob_fecha) VALUES ('$this->prob_apli_id', '$this->prob_descripcion', '$this->prob_estado', '$this->prob_fecha' )";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT t.*, a.aplicacion_nombre 
                FROM problemas t
                JOIN aplicaciones a ON t.prob_apli_id = a.aplicacion_id
                WHERE t.prob_situacion = '1'";
    
        if ($this->prob_apli_id != null) {
            $sql .= " AND t.prob_apli_id = $this->prob_apli_id";
        }
    
        if ($this->prob_estado != '') {
            $sql .= " AND t.prob_estado = '$this->prob_estado'";
        }
    
        $resultado = self::servir($sql);
        return $resultado;
    }
    
    

    public function modificar(){
        $sql = "UPDATE problemas SET prob_apli_id = '$this->prob_apli_id', prob_descripcion = '$this->prob_descripcion', prob_estado = '$this->prob_estado', prob_fecha = '$this->prob_fecha' WHERE prob_id = $this->prob_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
       // echo "Valor de prob_id: " . $this->prob_id;
        
        $sql = "UPDATE problemas SET prob_situacion = '0' WHERE prob_id = $this->prob_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    
}