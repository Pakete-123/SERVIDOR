<?php
namespace App\Models;

class Venta {

  private string $fecha;
  private string $hora;
  private array $prod;

  public function __construct(array $producto) {
    $this->fecha = date("Y-m-d");
    $this->hora = date("H:i:s");
    $this->prod = $producto;
  }

  public function getFecha() {
    return $this->fecha;
  }

  public function getHora() {
    return $this->hora;
  }

  public function getProd() {
    return $this->prod;
  }

  public function total() {
    return array_sum(array_map(fn($p) => $p->precio, $this->prod));
  }

}