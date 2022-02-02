<?php
class Conectar{
    public static function conexion(){
        $conexion = new mysqli("192.169.149.44", "weekeat", "sju458", "weekeat");
       
        return $conexion;
    }
}

?>