<?php 
session_start();

if ($_GET["modo"] === "oscuro") {
    $_SESSION["modo"] = "oscuro";
} else if ($_GET["modo"] === "claro") {
    $_SESSION["modo"] = "claro";
}

header("Location: index.php");
exit;
?>