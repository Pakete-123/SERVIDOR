<?php 
session_start();

function InicializarPacientes() {

        $_SESSION["pacientes"] = [
        [ 
            "nombre" => "Periko",
            "apellidos" => "Periquete",
            "username" => "periko",
            "password" => "1234",
            "fecha_cita" => "2025-10-25",
            "hora_cita" => "10:00"
        ],
        [
            "nombre" => "Ana",
            "apellidos" => "López García",
            "username" => "ana",
            "password" => "1234",
            "fecha_cita" => "2025-10-25",
            "hora_cita" => "10:30"
        ],
        [
            "nombre" => "Carlos",
            "apellidos" => "Ruiz Fernández",
            "username" => "carlos",
            "password" => "1234",
            "fecha_cita" => "2025-10-26",
            "hora_cita" => "09:00"
        ]
    ];
}

function VerificarUsuario($usr, $pwd) {

    foreach ($_SESSION["pacientes"] as $val) {

        if ($val["username"] === strtolower($usr) && $val["password"] === $pwd) {
        
            $_SESSION["login"]["nombre"] = $val["nombre"];
            $_SESSION["login"]["apellidos"] = $val["apellidos"];
            $_SESSION["login"]["username"] = $val["username"];
            $_SESSION["login"]["fecha_cita"] = $val["fecha_cita"];
            $_SESSION["login"]["hora_cita"] = $val["hora_cita"];

            return $_SESSION["login"];
        } 
    }  

}

?>