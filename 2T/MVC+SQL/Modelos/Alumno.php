<?php
namespace App\Modelos;

use Dba\Connection;

class Alumno {

    public int $id;
    public string $nombre;
    public string $email;
    public array $cursos = [];

    public function __construct(int $id, string $nombre, string $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function addCurso(Curso $curso): void {
        $this->cursos[] = $curso;
    }

    public static function getAll(): array {
        $db = Conexion::getConexion();

        $sql = "
            SELECT 
                a.id AS alumno_id,
                a.nombre AS alumno_nombre,
                a.email,
                c.id AS curso_id,
                c.nombre AS curso_nombre
            FROM alumnos a
            LEFT JOIN matriculas m ON a.id = m.alumno_id
            LEFT JOIN cursos c ON m.curso_id = c.id
            ORDER BY a.id
        ";

        $rows = $db->query($sql)->fetchAll();

        $alumnos = [];

        foreach ($rows as $row) {
            $id = $row['alumno_id'];

            if (!isset($alumnos[$id])) {
                $alumnos[$id] = new Alumno(
                    $id,
                    $row['alumno_nombre'],
                    $row['email']
                );
            }

            if ($row['curso_id']) {
                $alumnos[$id]->addCurso(
                    new Curso(
                        $row['curso_id'],
                        $row['curso_nombre']
                    )
                );
            }
        }

        return $alumnos;
    }

    public static function insert(string $nombre, string $email, array $cursos): void {
        $db = Conexion::getConexion();
        $db->beginTransaction();

        $stmt = $db->prepare(
            "INSERT INTO alumnos (nombre, email) VALUES (?, ?)"
        );
        $stmt->execute([$nombre, $email]);

        $alumnoId = $db->lastInsertId();

        $stmt = $db->prepare(
            "INSERT INTO matriculas (alumno_id, curso_id) VALUES (?, ?)"
        );

        foreach ($cursos as $cursoId) {
            $stmt->execute([$alumnoId, $cursoId]);
        }

        $db->commit();
    }

    public static function obtenerPorID($id) {

        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare("SELECT * FROM alumnos WHERE id = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);

    }

    public static function actualizar($id, $nombre, $email, $curso_id) {
        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare("UPDATE alumnos SET nombre = :nombre, email = :email, curso_id = :curso_id WHERE id = :id");
        return $stmt->execute([
            ":nombre" => $nombre,
            ":email" => $email,
            ":curso_id" => $curso_id,
            ":id" => $id
        ]);
    }

    public static function eliminar($id) {
        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare("DELETE FROM alumnos WHERE id = :id");
        return $stmt->execute([":id" => $id]);
    }

    public static function guardarCursos($a_id, $c_ids) {
        $stmt = Conexion::getConexion();
        $stmtLimpiar = $stmt->prepare("DELETE FROM matriculas WHERE alumno_id = :id");
        $stmtLimpiar->execute([":id" => $a_id]);

        if (!empty($c_ids)) {
            $stmtAñadir = $stmt->prepare("INSERT INTO matriculas (alumno_id, curso_id) VALUES (:a_id, :c_ids)");
            foreach ($c_ids as $cur_ids) {
                $stmtAñadir->execute([":a_id" => $a_id, ":c_ids" => $cur_ids]);
            }
        }
    }

    public static function obtenerIdsCursos($a_id) {
        $conn = Conexion::getConexion();
        $stmt = $conn->prepare("SELECT curso_id FROM matriculas WHERE alumno_id = :a_id");
        $stmt->execute([":a_id" => $a_id]);

        return $stmt->fetchAll(\PDO::FETCH_COLUMN) ?: [];
    }

}