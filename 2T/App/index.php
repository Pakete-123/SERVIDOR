<?php
use App\Controladores\Controlador;
use App\Modelos\Modelo;

require_once "Controladores/controlador.php";
require_once "Modelos/modelo.php";

$cont = new Controlador();
$mod = new Modelo();
echo $cont->mensaje() . "<br>" . $mod->registro();