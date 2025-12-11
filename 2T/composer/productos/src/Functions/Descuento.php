<?php
namespace App\Functions;

class Descuento {

  function aplicar($total) {
    
    $desc = 0;

    if ($total > 20) {

      $desc = 10;
      echo "{$total}€ -> Descuento aplicado: {$desc}%";

      return $total *=  $desc / 100;

    } else if ($total > 50) {

      $desc = 20;
      echo "{$total}€ -> Descuento aplicado: {$desc}%";
      
      return $total *= $desc / 100;
      
    } else {
      echo "{$total}€ -> No se ha aplicado ningún descuento";
    }

  }

}