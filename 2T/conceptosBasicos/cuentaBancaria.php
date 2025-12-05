<?php

class cuentaBancaria
{

  private $saldo;
  private $IBAN;
  private $titular;


  public function __construct()
  {
     $this->IBAN = "ES" . str_pad(rand(1, 99), 2, "0", STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0" ,STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0" ,STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0" ,STR_PAD_LEFT). " " . str_pad(rand(1, 9999), 4, "0" ,STR_PAD_LEFT);

     $this->saldo = rand(0, 9999);
  }

  public function getSaldo()
  {
    return $this->saldo;
  }

  public function getIBAN()
  {
    return $this->IBAN;
  }

  function depositar($cantidad) {
    $this->saldo += $cantidad;
    echo "<br>" . $this->getSaldo() . "€";
  }

  function retirar($cantidad) {
    if ($this->saldo < $cantidad) {
      echo "<br>No hay $cantidad € en su cuenta";
    } else {
      $this->saldo -= $cantidad;
      echo "<br>" . $this->getSaldo() . "€";
    }
  }

}

$c = new cuentaBancaria();

echo $c->getIBAN() . "<br>" . $c->getSaldo() . "€";
$c->depositar(rand(-9999, 9999));
$c->retirar(rand(1, 9999));