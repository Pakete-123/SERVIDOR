<?php 
require_once("includes/funciones.php");

if (!isset($_SESSION["pacientes"])) {
    InicializarPacientes();
}

$usr = $_POST["usr"] ?? "";
$pwd = $_POST["pwd"] ?? "";

if (VerificarUsuario($usr, $pwd)) { 

    header("Location: justificante.php");
    exit;
    
}
?>

<h2>❌Usuario o contraseña incorrectos</h2>
<a href="login.php">Volver al login</a>
    
