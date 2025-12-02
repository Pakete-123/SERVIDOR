<?php 
class Persona2 {

  public $nombre;
  public $edad;

public function __construct($nombre, $edad)
{
  $this->nombre = $nombre;
  $this->edad = $edad;
}

  function presentarse() {
    return "Hola soy " . $this->nombre . " y tengo " . $this->edad . " años. <br>Clase CON CONSTRUCTOR";
  }

}

$per = new Persona2("Paloma", 20);
echo $per->presentarse();