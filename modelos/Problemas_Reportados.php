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

    public function buscar($apli_id, $offi_grado, $offi_arma, $offi_nombre, $offi_apellido, $asigoff_id)
    {
        $sql = "SELECT a.apli_nombre, p.offi_grado, p.offi_arma, p.offi_nombre, p.offi_apellido, ap.asigoff_id,
            t.prob_descripcion, t.prob_estado, t.prob_fecha
            FROM aplicaciones a
            JOIN asignacion_oficiales ap ON a.apli_id = ap.asigoff_apli_id
            JOIN programadores p ON ap.asigoff_offi_id = p.offi_id
            JOIN problemas t ON t.prob_apli_id = a.apli_id
            WHERE 1=1";
    
        if (!empty($apli_id)) {
            $sql .= " AND a.apli_id = $apli_id";
        }
    
        if (!empty($offi_grado)) {
            $sql .= " AND p.offi_grado = '$offi_grado'";
        }

        if (!empty($offi_arma)) {
            $sql .= " AND p.offi_arma = '$offi_arma'";
        }
    
        if (!empty($offi_nombre)) {
            $sql .= " AND p.offi_nombre LIKE '%$offi_nombre%'";
        }

        if (!empty($offi_apellido)) {
            $sql .= " AND p.offi_apellido LIKE '%$offi_apellido%'";
        }
    
        if (!empty($asigoff_id)) {
            $sql .= " AND ap.asigoff_id = $asigoff_id";
        }
    
        $resultados = self::servir($sql);
    
        return $resultados;
    }
 }    