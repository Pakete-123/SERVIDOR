<?php
require_once("funciones.php");

if (isset($_POST["Refrescar"])) {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Duolingo</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h2>Idiomas</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Español</th>
      <th>Inglés</th>
    </tr>

    <?= fraseAleatoria($conn) ?>
  </table>
  <br><br>
  <form method="post">
    <input type="submit" value="Refrescar">
  </form>

</body>

</html>