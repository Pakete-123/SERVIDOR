<?php 
session_start();

if (!isset($_SESSION["favoritos"])){
        $_SESSION["favoritos"] =[];
    };

if (!isset($_SESSION["vehiculos"])) {
    $_SESSION["vehiculos"] = [
        [/*"pais" => "alemania",*/"tanque" => "Tiger 1"],
        [/*"pais" => "alemania", */"tanque" => "Panzer IV G"],
        [/*"pais" => "alemania", */"tanque" => "StuG III G"],
        [/*"pais" => "alemania",*/"tanque" => "Hetzer"],
        ["tanque" => "M8A1"]
    ];
};

if (isset($_GET["add"])) {
    $vehiculos = $_GET["add"];
    if (!in_array($vehiculos, $_SESSION["favoritos"])) {
        $_SESSION["favoritos"][] = $vehiculos;
    }
}

if (isset($_GET["borrar"])) {
    unset($_SESSION["favoritos"]);
};

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Favoritos</title>
</head>
<body>
    
    <h1>Mis Favoritos</h1>

    <ul>

        <?php 

        if (empty($_SESSION["favoritos"])) { ?>

            <p>No hay favoritos guardados en la sesión.</p>

        <?php } else {
        
        foreach ($_SESSION["favoritos"] as $fav) { ?>

                <li><?= htmlspecialchars($fav) ?></li>    
        
        <?php };
        }; ?>
    </ul>
    <hr>

    <h2>Artículos disponibles</h2>

    <ul>
       <?php foreach($_SESSION["vehiculos"] as $v) { ?>

            <li><?= htmlspecialchars($v["tanque"]) ?><a href="?add=<?= urlencode($v["tanque"])?>">[Añadir favorito]</a></li>
          
       <?php }; ?>
    </ul>

    <p><a href="?borrar">Borrar</a></p>

</body>
</html>