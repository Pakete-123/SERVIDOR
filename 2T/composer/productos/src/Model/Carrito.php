<?php
namespace App\Model;

use App\Functions\Descuento;

class Carrito extends Descuento {

  private array $carrito = [];

  function agregarProducto(Producto $prod) {

    $this->carrito[] = $prod;
    $ultimo = end($this->carrito);

    echo "Producto añadido: {$ultimo->getNombre()} con precio {$ultimo->getPrecio()} <br>";

  }

  function total() {
    $total = 0;

    foreach ($this->carrito as $c) {

      $total += $c->getPrecio();

    }

    return $total;
  }


  public function getCarrito() { ?>

    <table border="1">
      <thead>Productos Añadidos: </thead>
      <tbody>
      <tr>
        <th>Producto</th>
        <th>Precio</th>
      </tr>
      <?php
      foreach ($this->carrito as $c) { ?>

        <tr>
          <td><?= $c->getNombre() ?></td>
          <td><?= $c->getPrecio() ?></td>
        </tr>

      <?php }
      ?>
      </tbody>
    </table>


  <?php }
}