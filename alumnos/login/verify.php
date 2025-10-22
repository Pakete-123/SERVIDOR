<?php

session_start();

$usuarios = [
    "Paloma" => ["pwd" => "Django", "rol" => "admin"],
    "Pablo" => ["pwd" => "Admin.1234", "rol" => "usuario"],
    "Rafael" => ["pwd" => "1234", "rol" => "usuario"]
];

$usr = $_POST["usr"] ?? "";
$pwd = $_POST["pwd"] ?? "";

if (isset($usuarios[$usr]) && $usuarios[$usr]["pwd"] === $pwd) {

    $_SESSION["usuario"] = $usr;
    $_SESSION["rol"] = $usuarios[$usr]["rol"];

}

header("Location: index.php");
exit;
?>