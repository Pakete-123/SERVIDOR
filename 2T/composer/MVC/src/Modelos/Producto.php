<?php
namespace App\Modelos;

class Producto {

  private int $id;
  private string $nombre;
  private float $precio;

  public function __construct(int $id, string $nombre, float $precio) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->precio = $precio;
  }

  public function getPrecio() {
    return $this->precio;
  }
}