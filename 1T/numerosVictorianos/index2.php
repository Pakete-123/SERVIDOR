<?php

    function numVic($n) {

        $tabla = [
            'I' => 1,
            'II' => 2,
            'III' => 3,
            'IIII' => 4,
            'V' => 5,
            'VI' => 6,
            'VII' => 7,
            'VIII' => 8,
            'VIIII' => 9,
            'X' => 10,
            'XI' => 11,
            'XII' => 12,
            'XIII' => 13,
            'XIIII' => 14,
            'XV' => 15,
            'XVI' => 16,
            'XVII' => 17, 
            'XVIII' => 18,
            'XVIIII' => 19,
            'XX' => 20,
            'XXI' => 21,
            'XXII' => 22,
            'XXIII' => 23,
            'XXIIII' => 24,
            'XXV' => 25,
            'XXVI' => 26,
            'XXVII' => 27,
            'XXVIII' => 28,
            'XXVIIII' => 29,
            'XXX' => 30,
            'XXXI' => 31,
            'XXXII' => 32,
            'XXXIII' => 33,
            'XXXIIII' => 34,
            'XXXV' => 35,
            'XXXVI' => 36,
            'XXXVII' => 37,
            'XXXVIII' => 38,
            'XXXVIIII' => 39,
            'XL' => 40,
            'XLI' => 41,
            'XLII' => 42,
            'XLIII' => 43,
            'XLIIII' => 44,
            'XLV' => 45,
            'XLVI' => 46,
            'XLVII' => 47,
            'XLVIII' => 48,
            'XLVIIII' => 49,
            'L' => 50,
            'LI' => 51,
            'LII' => 52,
            'LIII' => 53,
            'LIIII' => 54,
            'LV' => 55,
            'LVI' => 56,
            'LVII' => 57,
            'LVIII' => 58,
            'LVIIII' => 59
        ];

        foreach ($tabla as $rom => $num) {
            if ($num == $n) return $rom;
        }

    };

    date_default_timezone_set("Europe/Madrid");

    echo "<meta http-equiv='refresh' content='1'>";
    echo "<table width='100%' height='100%'><th style='font-size: 150px'>" . numVic(date('H')) . " : " . numVic(date('i')) . " : " . numVic(date('s')) . "</th></table>";

?>