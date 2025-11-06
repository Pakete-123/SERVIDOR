<?php 

    $nom = $_GET["nombre"];
    $ape1 = $_GET["apellido1"];
    $ape2 = $_GET["apellido2"];
    $ape = $ape1 . " " . $ape2;
    $edad = $_GET["edad"];
    $tiempo = $_GET["tiempo"];

    echo "Hola, $nom $ape<br>";

    if ($edad > 18){
        echo "Eres mayor de edad ($edad)";
    } else {
        echo "Eres menor de edad ($edad)";
    }

    echo "<br>";
    switch ($tiempo) {
        case 'soleado' || 'Soleado':
            echo "Está soleado";
            break;
            
        case 'lluvioso' || 'Lluvioso':
            echo "Está lloviendo";
            break;

        case 'nublado' || 'Nublado':
            echo "Está nublado";
            break;
        
        default:
            "No has escrito ningún tiempo";
            break;
    }

?>