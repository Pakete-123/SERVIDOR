<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$controller = $_GET['controller'] ?? 'curso';
$action     = $_GET['action'] ?? 'index';

$controllerName = 'App\\Controladores\\' . ucfirst($controller) . 'Controller';

$controlador = new $controllerName();
$controlador->$action();