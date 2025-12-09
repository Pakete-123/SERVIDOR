<?php
namespace App\Models;

use App\Interfaces\Autenticable;
use App\Traits\Logger1;

class Usuario implements Autenticable {

  use Logger1;
  private $nombre;
  private $pwd;

  public function __construct($nom, $pwd)
  {
    $this->nombre = $nom;
    $this->pwd = $pwd;
  }

  function login($nombre, $pwd) {
    if (strtolower($this->nombre) === strtolower($nombre) && $this->pwd === $pwd) {
      $this->log("Sesión iniciada como {$nombre} (Usuario).");
    } else {
      $this->log("Inicio de sesión fallido para {$nombre}.");
    }
  }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPwd() {
        return $this->pwd;
    }
}
