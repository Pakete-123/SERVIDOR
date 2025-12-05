<?php
abstract class Figura {
  abstract public function area();
}

class Cuadrado extends Figura {

  private $l;

  public function __construct($l) {
    $this->l = $l;
  }

  public function area() {
    return $this->l ** 2;
  }
}

class Circulo extends Figura {

  private $r;

  public function __construct($r)
  {
    $this->r = $r;
  }

  public function area()
  {
    return 2 * pi() * $this->r;
  }

}

echo "Cuadrado: " . (new Cuadrado(2))->area() . "<br>Círculo: " . (new Circulo(5))->area();