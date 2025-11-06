<?php

    echo "<table border= '1' cellpadding= '5' cellspacing= '0'>";
    echo "<tr style='background-color: #00f; color: #fff';><th>x</th>";

    for ($col = 0; $col <= 10; $col++) {
        echo "<th>$col</th>";
    }

    echo "</tr>";

    for ($i = 0; $i <= 10; $i++) {
        echo "<tr>";
        echo "<th style='background-color: #ff7300ff; color: #fff';>$i</th>";
        for ($j=0; $j <= 10; $j++) { 
            echo "<td>" . $i * $j . "</td>";
        }

    echo "</tr><br>";

    }

    echo "</table>";

?>