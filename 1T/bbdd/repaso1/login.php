<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $nick = $_POST["nick"];
  $pwd = $_POST["password"];

  $stmt = $conn->prepare("SELECT PASSWORD FROM usuarios WHERE NICK = ?");
  $stmt->bind_param("s", $nick);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($pass);
    $stmt->fetch();

    if ($pwd === $pass) {
      $_SESSION["login"] = true;
      header("Location: index.php");
      exit;
    } else {
      echo "<p style='color: red'>❌ Contraseña Incorrecta</p>";
    }
  } else {
    echo "<p style='color: red'>❌ Usuario Incorrecto</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
</head>

<body>

  <form method="post">

    <label for="nick">Nick
      <input type="text" name="nick">
    </label>
    <br>
    <label for="nick">Contraseña
      <input type="password" name="password">
    </label>
    <br><br>
    <input type="submit" value="Iniciar Sesión">
  </form>

</body>

</html>