<?php

$it = 0;
$ent = $_POST["entrantes"] ?? "";
$pri = $_POST["primeros"] ?? "";
$seg = $_POST["segundos"] ?? "";
$pos = $_POST["postres"] ?? "";
$precio = 0;

if (strlen($ent) != 0 && strlen($pri) != 0 && strlen($seg) != 0 && strlen($pos) != 0) {
    $it++;
} 

if ($it > 0){
    switch ($ent) {
        case 'consome':
            echo "Consomé  3,50€<br>";
            $precio += 3.5;
            break;
        
        case 'castellana':
            echo "Sopa Castellana  7,00€<br>";
            $precio += 7;
            break;

        case 'judiones':
            echo "Judiones de la Granja  10,50€<br>";
            $precio += 10.50;
            break;

        case 'esparragos':
            echo "Espárragos con Mayonesa  7,00€<br>";
            $precio += 7;
            break;
        default:
            echo "No se introdujo ningún entrante<br>";
            break;
    }

    switch ($pri) {
        case 'anchoas':
            echo "Anchoas con Boquerones  16,00€<br>";
            $precio += 16;
            break;
        
        case 'chopitos':
            echo "Chopitos  14,00€<br>";
            $precio += 14;
            break;

        case 'revuelto-setas':
            echo "Revuelto de Setas con Gambas  11,50€<br>";
            $precio += 11.50;
            break;
            
        case 'revuelto-ajetes':
            echo "Revuelto de Ajetes con Gambas  11,50€<br>";
            $precio += 11.5;
            break;
        default:
            echo "No se introdujo ningún primero<br>";
            break;
    }

    switch ($seg) {
        case 'paletilla':
            echo "Paletilla de Lechal con patatas panaderas  26,00€<br>";
            $precio += 26;
            break;
        
        case 'rabo-toro':
            echo "Rabo de Toro Estofado  16,00€<br>";
            $precio += 16;
            break;

        case 'rodaballo':
            echo "Rodaballo a la Espalda  19,00€<br>";
            $precio += 16;
            break;
            
        case 'bacalao':
            echo "Bacalao a la Romana  16,00€<br>";
            $precio += 16;
            break;
        default:
            echo "No se introdujo ningún segundo<br>";
            break;
    }

    switch ($pos) {
        case 'tarta':
            echo "Tartas Variadas  6,00€<br>";
            $precio += 6;
            break;
        
        case 'nata-nueces':
            echo "Nueces con Nata  6,50€<br>";
            $precio += 6.5;
            break;

        case 'flan':
            echo "Flan de Huevo  4,00€<br>";
            $precio += 4;
            break;
            
        case 'banana':
            echo "Banana Split  9,50€<br>";
            $precio += 9.5;
            break;
        default:
            echo "No se introdujo ningún postre<br>";
            break;
    }

    echo "<hr>Total: <h3>$precio €</h3>";
} else{
    echo "No se introdujo ningún plato";
}

?>