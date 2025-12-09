<?php 
namespace App\Traits;

trait Logger1 {
  function log($mensaje) {
    $fecha = date("Y-m-d H:i:s");
    echo "[LOG] <$fecha> ➡ $mensaje";
  }
}
