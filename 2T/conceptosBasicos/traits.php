<?php
trait Logger {
  public function log($mensaje) {
    $fecha = date("Y-m-d H:i:s");
    echo "<$fecha> -> $mensaje";
  }
}

class Usuario {
  use Logger;
  private $nombre;
  private $edad;

  public function __construct($nom, $ed) {
    $this->nombre = $nom;
    $this->edad = $ed;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getEdad() {
    return $this->edad;
  }
}

class Producto {
  use Logger;
  private $código;

  public function __construct($cod) {
    $this->código = $cod;
  }

  public function getCódigo() {
    return $this->código;
  }

}

$usr = new Usuario("Pablo", 20);
$usr->log("Usuario creado con nombre: " . $usr->getNombre() . " y edad " . $usr->getEdad());
echo "<br>";
$prod = new Producto("C" . rand(1, 99));
$prod->log("Producto creado con código: " . $prod->getCódigo());