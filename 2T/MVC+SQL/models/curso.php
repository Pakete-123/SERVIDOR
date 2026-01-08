<?php
namespace Modelos;

class Curso {

  private int $id;
  private string $nombre;
  private string $duracion;
  private float $precio;

  public function __construct($nombre = null, $duracion = null, $precio = null, $id = null) {
    $this->nombre = $nombre;
    $this->duracion = $duracion;
    $this->precio = $precio;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function getDuracion() {
    return $this->duracion;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function setDuracion($duracion) {
    $this->duracion = $duracion;
  }

  public function setPrecio($precio) {
    $this->precio = $precio;
  }


  public function getAll() {

    $conn = Conexion::conexion();
    $sql = $conn->query("SELECT * FROM cursos");
    return $sql->fetch_all(MYSQLI_ASSOC);

  }

  public function insert() {

    $conn = Conexion::conexion();
    $query = $conn->query("SELECT * ")

  }

}