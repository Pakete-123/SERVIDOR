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
        return $db->query("SELECT * FROM cursos")->fetchAll();
    }

    public static function insert($nombre, $duracion, $precio) {
        $db = Conexion::getConexion();
        $stmt = $db->prepare(
            "INSERT INTO cursos (nombre, duracion, precio) VALUES (?, ?, ?)"
        );
        $stmt->execute([$nombre, $duracion, $precio]);
    }

    public static function delete(int $id): void {
        $db = Conexion::getConexion();

        $db->prepare("DELETE FROM matriculas WHERE curso_id = ?")
        ->execute([$id]);

        $db->prepare("DELETE FROM cursos WHERE id = ?")
        ->execute([$id]);
    }
}