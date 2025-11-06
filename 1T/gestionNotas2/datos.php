<?php 

if (!isset($_SESSION["alumnos"])) {

    $_SESSION["alumnos"] = [
        [
            "nombre" => "Juan Atahona",
            "edad" => 21,
            "curso" => "2º DAW",
            "nota" => 6.9
        ],
        [
            "nombre" => "Yesenia Toro",
            "edad" => 21,
            "curso" => "1º DAW",
            "nota" => 6.7
        ],
        [
            "nombre" => "Rafael Hortelano",
            "edad" => 20,
            "curso" => "2º SMR",
            "nota" => 8.3
        ],
        [
            "nombre" => "Paloma Aguilar",
            "edad" => 20,
            "curso" => "1º AAF",
            "nota" => 10
        ],
    ];

}

?>