<?php

interface Vehiculo {
  public function arrancar();
  public function detener();
}

class Coche implements Vehiculo {
  public function arrancar()
  {
    return "El coche arranca el motor";
  }

  public function detener()
  {
    return "El coche detiene el motor";
  }

}

class Moto implements Vehiculo {

public function arrancar()
{
  return "La moto arranca el motor";
}

public function detener()
{
  return "La moto detiene el motor";
}

}
$c = new Coche();
$m = new Moto();

echo $c->arrancar() . " -> " . $c->detener() . "<br>" . $m->arrancar() . " -> " . $m->detener();