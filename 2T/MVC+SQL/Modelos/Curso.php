<?php
namespace App\Modelos;

class Curso {

    public int $id;
    public string $nombre;

    public function __construct(int $id, string $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public static function getAll() {
        $db = Conexion::getConexion();
        return $db->query("SELECT * FROM cursos")->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function insert($nombre, $duracion, $precio) {
        $db = Conexion::getConexion();
        $stmt = $db->prepare(
            "INSERT INTO cursos (nombre, duracion, precio) VALUES (?, ?, ?)"
        );
        $stmt->execute([$nombre, $duracion, $precio]);
    }
}