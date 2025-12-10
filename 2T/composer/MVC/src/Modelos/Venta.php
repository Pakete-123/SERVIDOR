<?php
namespace App\Modelos;

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

}