<?php
namespace App\Models;

class Producto {

  private int $id;
  private string $nombre;
  private float $precio;

  public function __construct(int $id, string $nombre, float $precio) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->precio = $precio;
  }

  public function getId() {
      return $this->id;
  }
  
  public function getNombre() {
      return $this->nombre;
  }

  public function getPrecio() {
    return $this->precio;
  }

}