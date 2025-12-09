<?php
require "vendor/autoload.php";

use App\Models\Usuario;
use App\Models\Administrador;

$usuario = new Usuario("Pablo", "Usuario.1234");
$admin = new Administrador("Paloma", "Admin.1234");

$usuario->login("Pablo", "Usuario.1234");
echo "<br>";
if ($admin->login("Paloma", "Admin.1234")) {
  echo "<br>";
  $admin->accesoAdmin();
}
