<?php 
class Persona3 {

  private $nombre;
  private $edad;

  public function setNombre($nom) {
    $this->nombre = $nom;
  }
  public function setEdad($edad) {
    $this->edad = $edad;
  }

  function presentarse() {
    return "Hola soy $this->nombre y tengo $this->edad años. <br>Clase PRIVADA";
  }

  function cumpleaños() {
    return "¡Hoy cumplo $this->edad años!";
  }

}

$per = new Persona3();
$per->setNombre("Paloma");
$per->setEdad(20);
echo $per->presentarse() . "<br>";
echo $per->cumpleaños();