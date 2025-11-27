<?php
session_start();
if (!isset($_SESSION["contador"])) {
  $_SESSION["contador"] = 1;
} else {
  $_SESSION["contador"]++;
}

if (isset($_GET["reiniciar"])) {
  session_destroy();
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Ejer3</title>
</head>

<body>

  <p>Visitas en esta sesión: <?= $_SESSION["contador"] ?></p>
  <a href="?reiniciar"><button>Reiniciar contador</button></a>

</body>

</html>