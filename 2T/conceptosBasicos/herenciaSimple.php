<?php

class Animal {

  public function hacerSonido() {
    return "Cada animal hace un ruido.";
  }

}

class Perro extends Animal {

  public function hacerSonido() {
    return parent::hacerSonido() . " El Perro hace Guau.";
  }

}

class Gato extends Animal {

  public function hacerSonido()
  {
    return parent::hacerSonido() . " El Gato hace Miau";
  }

}

function probarSonido(object $animal) {
  if ($animal instanceof Animal) {
    return $animal->hacerSonido();
  } else if ($animal instanceof Perro) {
    return $animal->hacerSonido();
  } else if ($animal instanceof Gato) {
    return $animal->hacerSonido();
  }
}

// $p = new Perro();
// $g = new Gato();

// echo $p->hacerSonido() . "<br>" . $g->hacerSonido();
echo (new Perro())->hacerSonido() . "<br>" . (new Gato())->hacerSonido();
echo "<br><br>Probamos un sonido -> " . probarSonido(new Gato());