<?php 
class Persona {

  public $nombre;
  public $edad;

  function presentarse() {
    return "Hola soy " . $this->nombre . " y tengo " . $this->edad . " años.<br> Clase SIN CONSTRUCTOR";
  }

}

$per = new Persona();
$per->nombre = "Paloma";
$per->edad = 20;
echo $per->presentarse();