<?php

$alumnos = [
  ["nombre" => "Ana", "nota" => 7.5],
  ["nombre" => "Luis", "nota" => 4.2],
  ["nombre" => "Marta", "nota" => 8.9],
  ["nombre" => "Juan", "nota" => 5.1],
  ["nombre" => "María", "nota" => 3.7],
  ["nombre" => "Anselmo", "nota" => 9.1]
];

function calcularMedia($alumnos)
{

  $media = 0;

  foreach ($alumnos as $val) {

    $media += $val["nota"];
  }

  echo $media = $media / count($alumnos);
}
function aprobados($alumnos)
{ ?>

  <h2>Alumnos aprobados sin ordenar</h2>

  <?php $apr = [];
  foreach ($alumnos as $val) {
    if ($val["nota"] >= 5) {
      $apr[] = $val; ?>
      Nombre: <?= $val["nombre"] ?>,
      Nota: <?= $val["nota"] ?><br>
  <?php
    }
  }

  usort($apr, function ($a, $b) {
    return $b["nota"] <=> $a["nota"];
  }); ?>

  <h2>Alumnos aprobados ordenados</h2>

  <?php foreach ($apr as $val) { ?>
    Nombre: <?= $val["nombre"] ?>,
    Nota: <?= $val["nota"] ?><br>
<?php
  }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Ejer4</title>
</head>

<body>

  <p>Media: <?= calcularMedia($alumnos) ?></p>
  <?= aprobados($alumnos) ?>

</body>

</html>
<?php
if (isset($_GET["nombre"])) {
  $nom = strtolower($_GET["nombre"]);
  foreach ($alumnos as $val) {
    if (strtolower($val["nombre"]) == $nom) { ?>
      Nota de <?= $val["nombre"] ?>: <?= $val["nota"] ?>
<?php    }
  }
}
