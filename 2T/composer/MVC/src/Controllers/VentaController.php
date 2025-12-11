<?php 
namespace App\Controllers;
use App\Models\Producto;
use App\Models\Venta;

class VentaController {
  
  private array $prodDisp;

  public function __construct()
  {
    $this->prodDisp = [
      new Producto(1, "Teclado", 19.99),
      new Producto(2, "Ratón", 15.99),
      new Producto(3, "Procesador", 569.23),
      new Producto(4, "Tarjeta Gráfica", 514.80),
      new Producto(5, "Disipador", 60)
    ];
  }
  
  function form(array $data = []) {
    $prodDisp = $this->prodDisp;

    ob_start();
    require "/../Views/Ventas/Form.php";
    $contenido = ob_get_clean();

    require "/../Views/layout.php";

  }

  function guardar() {

    $sel = $_POST["Productos"] ?? [];
    $ids = array_map("intval", $sel);

    if (empty($ids)) {
      return $this->form(["error" => "Introduce al menos un producto"]);
    }

    $productos = array_values(array_filter($this->prodDisp, fn(Producto $p) => in_array($p->getId(), $ids, true)));

    $venta = new Venta();
    $venta->setProd($productos);

    if (!isset($_SESSION["ventas"])) {
      $_SESSION["ventas"];
    }

  }
}