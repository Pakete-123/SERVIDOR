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

  public function getNombre()
  {
    return $this->nombre;
  }
  public function getEdad()
  {
    return $this->edad;
  }

  function presentarse($nombre, $edad) {
    return "Hola soy $nombre y tengo $edad años. <br>Clase PRIVADA";
  }

  function cumpleaños($edad) {
    return "¡Hoy cumplo $edad años!";
  }

}

$per = new Persona3();
$per->setNombre("Paloma");
$per->setEdad(20);
echo $per->presentarse($per->getNombre(), $per->getEdad()) . "<br>";
echo $per->cumpleaños($per->getEdad());