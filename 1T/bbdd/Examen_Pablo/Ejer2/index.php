<?php

$enteros = [];
for ($i = 0; $i < 10; $i++) {
  $enteros[] = rand(1, 100);
}

function estadisticas(array $numeros)
{

  $min = 100;
  $max = 0;
  $media = 0;
  $cantidad_elementos = sizeof($numeros);

  for ($i = 0; $i < 10; $i++) {
    if ($numeros[$i] > $max) {
      $max = $numeros[$i];
    }
    if ($numeros[$i] < $min) {
      $min = $numeros[$i];
    }

    $media = $media + $numeros[$i];
  }
  $media = $media / $cantidad_elementos ?>

  <p>
    Mínimo: <?= $min ?> <br>
    Máximo: <?= $max ?> <br>
    Media: <?= $media ?> <br>
    Nº elementos: <?= $cantidad_elementos ?>
  </p>

<?php }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Ejer2</title>
</head>

<body>

  <?= estadisticas($enteros) ?>

</body>

</html>