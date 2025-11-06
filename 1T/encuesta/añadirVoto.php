<?php 
session_start();

$gen = $_POST["gen"] ?? null;

if ($gen && isset($_SESSION["voto"][$gen])) {
    $_SESSION["voto"][$gen]++;
};

header("Location: index.php");
exit;

?>