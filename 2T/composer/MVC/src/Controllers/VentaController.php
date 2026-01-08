<?php
namespace App\Controllers;
use App\Models\Producto;
use App\Models\Venta;

class VentaController {

  private array $prodDisp;

  public function __construct() {
    $this->prodDisp = [
      new Producto(1, "Teclado", 19.99),
      new Producto(2, "Ratón", 15.99),
      new Producto(3, "Procesador", 569.23),
      new Producto(4, "Tarjeta Gráfica", 514.80),
      new Producto(5, "Disipador", 60)
    ];
  }

  public function form(array $data = []) {
    $prodDisp = $this->prodDisp;

    ob_start();
    require "/../Views/Ventas/Form.php";
    $contenido = ob_get_clean();

    require "/../Views/Layout.php";

  }

  public function guardar() {

    $sel = $_POST["Productos"] ?? [];
    $ids = array_map("intval", $sel);

    if (empty($ids)) {
      return $this->form(["error" => "Introduce al menos un producto"]);
    }

    $productos = array_values(array_filter($this->prodDisp, fn(Producto $p) => in_array($p->getId(), $ids, true)));

    $venta = new Venta($productos);

    if (!isset($_SESSION["ventas"])) {
      $_SESSION["ventas"] = [];
    }

    $_SESSION["Ventas"][] = $venta;

    $this->lista();
  }

  public function lista() {

    $ventas = $_SESSION["Ventas"] ?? [];

    ob_start();
    require "/../Views/Ventas/Lista.php";

    $contenido = ob_get_clean();

    require "/../Views/Layout.php";
  }

  function borrar() {

    unset($_SESSION["ventas"]);
    $this->lista();
  }

}