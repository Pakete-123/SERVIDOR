<?php 
session_start();

if (array_values($_SESSION["voto"]) === 0) {
    echo "<p style='color: red'>❌ No hay votos todavía</p>";
};

?>