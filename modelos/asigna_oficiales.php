<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class AsignacionOficiales extends Conexion{
    public $asigoff_id;
    public $asigoff_apli_id;
    public $asigoff_offi_id;

    public function __construct($args = [])
    {
        $this->asigoff_id = $args['asigoff_id'] ?? null;
        $this->asigoff_apli_id = $args['asigoff_apli_id'] ?? null;
        $this->asigoff_offi_id = $args['asigoff_offi_id'] ?? null;
    }

    public function guardar(){
        $sql = "INSERT INTO asignacion_oficiales (asigoff_apli_id, asigoff_offi_id) VALUES ('$this->asigoff_apli_id', '$this->asigoff_offi_id')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
    public function buscar()
    {
        $sql = "SELECT a.apli_nombre, p.offi_grado, p.offi_arma, p.offi_nombre, ap.asigoff_id,
        t.prob_descripcion, t.prob_estado, t.prob_fecha
        FROM aplicaciones a
        JOIN asignacion_oficiales ap ON a.apli_id = ap.asigoff_apli_id
        JOIN oficiales p ON ap.asigoff_offi_id = p.offi_id
        JOIN problemas t ON t.prob_apli_id = a.apli_id
        WHERE 1=1";

    
            if (!empty($nombreAplicacion)) {
                $sql .= " AND a.apli_nombre LIKE '%$nombreAplicacion%'";
            }

            if (!empty($gradoOficial)) {
                $sql .= " AND p.offi_grado = '$gradoOficial'";
            }

            if (!empty($armaOficial)) {
                $sql .= " AND p.offi_arma = '$armaOficial'";
            }

            if (!empty($nombreOficial)) {
                $sql .= " AND p.offi_nombre LIKE '%$nombreOficial%'";
            }

            if (!empty($asignacionId)) {
                $sql .= " AND ap.asigoff_id = $asignacionId";
            }


    
        $resultado = self::servir($sql);
    
        return $resultado;
    }
    
    
    
    
    public function modificar(){
        $sql = "UPDATE asignacion_oficiales SET asigoff_apli_id = '$this->asigoff_apli_id', asigoff_offi_id = '$this->asigoff_offi_id' WHERE asigoff_id = $this->asigoff_id";
        

        // echo $sql;
        // exit;
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM asignacion_oficiales WHERE asigoff_id = $this->asigoff_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
