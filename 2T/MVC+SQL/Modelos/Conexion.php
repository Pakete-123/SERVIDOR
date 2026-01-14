<?php
namespace App\Modelos;

use PDO;

class Conexion {
    public static function getConexion() {
        return new PDO(
            "mysql:host=localhost;dbname=matriculacion_mvc;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}