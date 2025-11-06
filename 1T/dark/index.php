<?php 
session_start();

if (!isset($_SESSION["modo"])) {
    $_SESSION["modo"] = "claro";
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Fondo</title>
    <?php if ($_SESSION["modo"] === "claro") { ?>
        <link rel="stylesheet" href="claro.css"> 
    <?php } else if ($_SESSION["modo"] === "oscuro") { ?>
        <link rel="stylesheet" href="oscuro.css">
    <?php } ?>
</head>
<body>
    
    <?php 
    if ($_SESSION["modo"] === "claro"){ ?>
        <h1>Estás en modo claro</h1>
        <p>Cuando le des al botón, se pondrá en modo oscuro</p>
        <a href="cambio.php?modo=oscuro"><button>Modo Oscuro</button></a>
    <?php } else if ($_SESSION["modo"] === "oscuro") {?>
        <h1>Estás en modo oscuro</h1>
        <p>Cuando le des al botón, se pondrá en modo claro</p>
        <a href="cambio.php?modo=claro"><button>Modo Claro</button></a>
    <?php }?>

</body>
</html>