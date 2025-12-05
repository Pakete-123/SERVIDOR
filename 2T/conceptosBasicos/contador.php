<?php
class Contador {
  public static int $I = 0;

  private $nombre;

  public function __construct($nombre) {
    self::$I++;
    $this->nombre = $nombre;
  }

  public function mostrarDatos() {
    echo "Hola, soy $this->nombre<br>";
  }

  public function mostrarInstancias() {
    echo "Se han creado " . self::$I . " instancias<br><br>";
  }

}

$c1 = new Contador("Rafa");
$c2 = new Contador("Pablo");

$c1->mostrarInstancias();
$c1->mostrarDatos();
$c2->mostrarDatos();