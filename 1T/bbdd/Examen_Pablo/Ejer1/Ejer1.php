<?php

if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $edad = round($_POST["edad"]);
  $i = 0;

  while ($i) {
    if (strlen($nombre) < 3) {
      $i++; ?>
      <p>Longitud mínima del nombre: 3</p>
      <a href="index.html">Volver</a>

    <?php break;
    }

    if ($edad < 1 || $edad > 120) {
      $i++; ?>
      <p>Edad mínima: 1 <br>Edad máxima: 120</p>
      <a href="index.html">Volver</a>
    <?php break;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $i++; ?>
      <p>El correo debe ser válido</p>
      <a href="index.html">Volver</a>
    <?php break;
    }
  }
  if ($i === 0) { ?>

    <h1>Datos recibidos correctamente</h1>
    <table border="1">
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Email</th>
      </tr>
      <tr>
        <td><?= $nombre ?></td>
        <td><?= $edad ?></td>
        <td><?= $email ?></td>
      </tr>
    </table>

<?php  }
} else {
  header("Location: index.html");
  exit;
}
?>