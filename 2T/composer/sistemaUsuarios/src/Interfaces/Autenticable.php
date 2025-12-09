<?php
namespace App\Interfaces;

interface Autenticable {

  function login(string $usuario, string $pwd);

}