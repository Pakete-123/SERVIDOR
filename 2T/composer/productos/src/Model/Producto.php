<?php
namespace App\Model;

class Producto {

  private string $nombre;
  private float $precio;

  public function __construct($nombre, $precio) {
    $this->nombre = $nombre;
    $this->precio = round($precio, 2);
  }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }
}