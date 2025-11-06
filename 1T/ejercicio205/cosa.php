<?php

    $sus = $_POST["sustantivo"] ?? "";
    $verb = $_POST["verbo"] ?? "";
    $adj = $_POST["adjetivo"] ?? "";
    $adv = $_POST["adverbio"] ?? "";
    $nom = $_POST["nombre"] ?? "";
    $ape = $_POST["apellido"] ?? "";

    echo "Hola, soy $nom $ape y se cosas sobre ti<br>";
    echo "Te gusta $verb con tu $sus $adj $adv";

?>