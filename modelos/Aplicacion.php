<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $apli_id;
    public $apli_nombre;
    public $apli_fecha;
    public $apli_situacion;

    public function __construct($args = [] )
    {
        $this->apli_id = $args['apli_id'] ?? null;
        $this->apli_nombre = $args['apli_nombre'] ?? '';
        $this->apli_fecha = $args['apli_fecha'] ?? '';
        $this->apli_situacion = $args['apli_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO aplicaciones (apli_nombre, apli_fecha) VALUES ('$this->apli_nombre', '$this->apli_fecha')";
        // echo $sql;
        // exit;
        $resultado = self::ejecutar($sql);

        return $resultado;

    }
    public function buscar(){
        $sql = "SELECT * FROM aplicaciones WHERE apli_situacion = 1";

        if($this->apli_nombre != ''){
            $sql .= " AND apli_nombre LIKE '%$this->apli_nombre%'";
        }

        if($this->apli_fecha != ''){
            $sql .= " AND apli_fecha = '$this->apli_fecha'";
        }

        if($this->apli_id != null ){
            $sql .= " AND apli_id = $this->apli_id";
        }
        //echo $sql;
        //exit;
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar(){
        $sql = "UPDATE aplicaciones SET apli_nombre = '$this->apli_nombre', apli_fecha = '$this->apli_fecha' WHERE apli_id = $this->apli_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE aplicaciones SET apli_situacion = 0 WHERE apli_id = $this->apli_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
