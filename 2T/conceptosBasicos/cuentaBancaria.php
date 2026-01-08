<?php

class cuentaBancaria {

  private $saldo;
  private $IBAN;
  private $titular;


  public function __construct($titular) {
    $this->IBAN = "ES" . str_pad(rand(1, 99), 2, "0", STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0", STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0", STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0", STR_PAD_LEFT) . " " . str_pad(rand(1, 9999), 4, "0", STR_PAD_LEFT);
    $this->titular = $titular;
    $this->saldo = rand(0, 9999);
  }

  public function getSaldo() {
    return $this->saldo;
  }

  public function getIBAN() {
    return $this->IBAN;
  }

  function depositar($cantidad) {
    $this->saldo += $cantidad;
    return "<br>" . $this->getSaldo() . "€";
  }

  function retirar($cantidad) {
    if ($this->saldo < $cantidad) {
      return "<br>No hay $cantidad € en su cuenta";
    } else {
      $this->saldo -= $cantidad;
      return "<br>" . $this->getSaldo() . "€";
    }
  }


  public function getTitular() {
    return $this->titular;
  }
}

$c = new cuentaBancaria("Pablo");

echo "Titular: {$c->getTitular()} <br>IBAN: {$c->getIBAN()} <br>Saldo Disponible: {$c->getSaldo()}€";
echo "Has depositado {$c->depositar(rand(-9999, 9999))}";
echo "Has retirado {$c->retirar(rand(1, 9999))}";