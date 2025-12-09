<?php
namespace App\Models;

class Administrador extends Usuario {

  function login($nombre, $pwd){
    if (strtolower($this->getNombre()) === strtolower($nombre) && $this->getPwd() === $pwd) {
      $this->log("Sesión iniciada como {$nombre} (Administrador).");
      return true;
    } else {
      $this->log("Inicio de sesión fallido para {$nombre}.");
      return false;
    }
  }

  function accesoAdmin() {
    $this->log("➡ ➡ Acceso permitido a la Administración");
  }

}

