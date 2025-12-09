<?php
require "vendor/autoload.php";

use App\Model\Producto;
use App\Model\Carrito;

$p1 = new Producto("Pepino", 4.525);
$p2 = new Producto("Tomate", 3.239);


$c = new Carrito();
$c->agregarProducto($p1);
$c->agregarProducto($p2);

$c->aplicar($c->total());
echo "<br>";
$c->getCarrito();