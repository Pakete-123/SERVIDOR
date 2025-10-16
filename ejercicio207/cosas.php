<?php

    $dinero = $_POST["dinero"];
    $b500 = 0;
    $b200 = 0;
    $b100 = 0;
    $b50 = 0;
    $b20 = 0;
    $b10 = 0;
    $b5 = 0;
    $m2 = 0;
    $m1 = 0;

    while ($dinero > 0) {

        if ($dinero >= 500) {
            $b500++;
            $dinero -= 500;
        } elseif ($dinero >= 200) {
            $b200++;
        } elseif ($dinero >= 100) {
            $b100++;
            $dinero -= 100;
        } elseif ($dinero >= 50) {
            $b50++;
            $dinero -= 50;
        } elseif ($dinero >= 20) {
            $b20++;
            $dinero -= 20;
        } elseif ($dinero >= 10) {
            $b10++;
            $dinero -= 10;
        } elseif ($dinero >= 5) {
            $b5++;
            $dinero -= 5;
        } elseif ($dinero >= 2) {
            $m2++;
            $dinero -= 2;
        } elseif ($dinero >= 1) {
            $m1++;
            $dinero -= 1;
        }

    }

?>