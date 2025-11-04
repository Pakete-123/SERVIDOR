<?php 
session_start();

usort($_SESSION["productos"], function ($a, $b) {
    return $b["precio"] <=> $a["precio"];
});

?>
