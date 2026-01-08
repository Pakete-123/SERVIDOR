<?php
namespace Modelos;

use mysqli;

class Conexion {
  private static $host = "localhost";
  private static $user = "root";
  private static $pass = "";
  private static $db = "matriculacion_mvc";

  public static function conexion() {

    $conn = new mysqli(self::$host, self::$user, self::$pass, self::$db);

    if ($conn->connect_error) {
      die("Error de conexión: $conn->connect_error");
    }

    $conn->set_charset("utf8");
    return $conn;

  }
}