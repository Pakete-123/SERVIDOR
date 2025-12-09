<?php
spl_autoload_register( function($clase) {
  require_once "Clases/$clase.php";
});

$c = new Clases();
echo $c->log();