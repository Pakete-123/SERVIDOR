<?php
spl_autoload_register( function($clase) {
  require_once "Classes/$clase.php";
});

$c = new Clases();
echo $c->log();