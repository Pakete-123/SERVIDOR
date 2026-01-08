<?php
require "/../vendor/autoload.php";
session_start();

use App\Controllers\VentaController;

error_reporting(E_ALL);
ini_set("display_errors", 1);

$controller = new VentaController();

$accion = $_GET["action"] ?? "form";

switch ($action) {
  case "form":
    $controller->form();
    break;

  case "guardar":
    $controller->guardar();
    break;

  case "lista":
    $controller->guardar();
    break;

  case "borrar":
    $controller->borrar();
    break;

  default:
    $controller->form();
}