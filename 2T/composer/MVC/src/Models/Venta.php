<?php
namespace App\Models;

class Venta {

  private string $fecha = date("YYYY-mm-dd");
  private string $nombre = date("HH:ii:ss");
  private Producto $prod = [];

  public function total() {
    $suma = 0.0;
    foreach ($this->prod as $p) {

      $suma += floatval($p->getPrecio());

    }
    return $suma;
  }

  public function getProd() {
    return $this->prod;
  }

  public function setProd($prod) {
    $this->prod = $prod;
  }

}