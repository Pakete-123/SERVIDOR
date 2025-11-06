<?php

function numVic($n) {
    //Creamos un array asociativo con los numeros romanos y sus equivalentes
    $conversion = [
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1
    ];

    //Establecemos el resultado en un campo vacío
    $resultado = "";

    //Recorremos el array con un foreach 
    foreach ($conversion as $romano => $val) {
        //Añadimos el resultado en la variable con un while 
        while ($n >= $val) {
            //Concatenamos el resultado de la operación anterior con el resultado que ya tuviesemos antes con .= (XL -> XLV -> XLVI -> XLVII)
            $resultado .= $romano;
            //Restamos al número introducido el valor de la operación anterior (47 - 40 -> 7 - 5 -> 2 - 1 -> 1 - 1)
            $n -= $val;
        };
    };
    return $resultado;
};

//Establecemos la zona horaria
date_default_timezone_set("Europe/Madrid");

//Le decimos al http que refresque cada segundo para tener la hora actual
echo "<meta http-equiv='refresh' content='1'>";
//Escribimos la hora actual llamando a la función
    echo "<table width='100%' height='100%'><th style='font-size: 150px'>" . numVic(date('H')) . " : " . numVic(date('i')) . " : " . numVic(date('s')) . "</th></table>";

?>