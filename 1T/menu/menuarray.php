<?php
$precio = 0;
$pedido = [
    "entrantes" => $_POST["entrantes"] ?? "",
    "primeros"  => $_POST["primeros"] ?? "",
    "segundos"  => $_POST["segundos"] ?? "",
    "postres"   => $_POST["postres"] ?? ""
];

$menu = [
    "entrantes" => [
        "consome"     => ["Consomé", 3.5],
        "castellana"  => ["Sopa Castellana", 7],
        "judiones"    => ["Judiones de la Granja", 10.5],
        "esparragos"  => ["Espárragos con Mayonesa", 7]
    ],
    "primeros" => [
        "anchoas"        => ["Anchoas con Boquerones", 16],
        "chopitos"       => ["Chopitos", 14],
        "revuelto-setas" => ["Revuelto de Setas con Gambas", 11.5],
        "revuelto-ajetes"=> ["Revuelto de Ajetes con Gambas", 11.5]
    ],
    "segundos" => [
        "paletilla" => ["Paletilla de Lechal con patatas panaderas", 26],
        "rabo-toro" => ["Rabo de Toro Estofado", 16],
        "rodaballo" => ["Rodaballo a la Espalda", 19],
        "bacalao"   => ["Bacalao a la Romana", 16]
    ],
    "postres" => [
        "tarta"       => ["Tartas Variadas", 6],
        "nata-nueces" => ["Nueces con Nata", 6.5],
        "flan"        => ["Flan de Huevo", 4],
        "banana"      => ["Banana Split", 9.5]
    ]
];

foreach ($pedido as $categoria => $opcion) {
    if (isset($menu[$categoria][$opcion])) {
        [$nombre, $precio] = $menu[$categoria][$opcion];
        echo "$nombre  $precio €<br>";
        $precio += $precio;
    } else {
        echo "No se introdujo ningún $categoria<br>";
    }
};

echo "<hr>Total: <h3>$precio €</h3>";
?>
