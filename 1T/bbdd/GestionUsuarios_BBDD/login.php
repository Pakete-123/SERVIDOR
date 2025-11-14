<?php
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nick = $_POST["nick"];
  $pwd = $_POST["pwd"];

  $stmt = $conn->prepare("SELECT PASSWORD FROM usuarios WHERE NICK = ?");
  $stmt->bind_param("s", $nick);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($pwd_bbdd);
    $stmt->fetch();

    if ($pwd === $pwd_bbdd) {

      $_SESSION["login"] = true;
      header("Location: introducirUsuario.php");
      exit;

    } else {
      echo "<p style='color: #FF0000'>❌ Contraseña Incorrecta</p>";
    }
    
  } else {
    echo "<p style='color: #FF0000'>❌ Usuario Incorrecto</p>";
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Usuarios</title>
</head>

<body>

  <form action="login.php" method="post">
    <label for="nick">Nick <br>
      <input type="text" name="nick" required>
    </label>
    <br><br>
    <label for="password">Contraseña <br>
      <input type="password" name="pwd" required>
    </label>
    <br><br>
    <input type="submit" value="Iniciar Sesión">
  </form>

</body>

</html>