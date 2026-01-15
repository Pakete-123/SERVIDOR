<?php
namespace App\Modelos;

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

    public static function getById(int $id): Alumno {
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
            WHERE a.id = ?
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();

        $alumno = new Alumno(
            $rows[0]['alumno_id'],
            $rows[0]['alumno_nombre'],
            $rows[0]['email']
        );

        foreach ($rows as $row) {
            if ($row['curso_id']) {
                $alumno->addCurso(
                    new Curso($row['curso_id'], $row['curso_nombre'])
                );
            }
        }

        return $alumno;
    }

    public static function update(int $id, string $nombre, string $email): void {
        $db = Conexion::getConexion();

        $stmt = $db->prepare(
            "UPDATE alumnos SET nombre = ?, email = ? WHERE id = ?"
        );
        $stmt->execute([$nombre, $email, $id]);
    }

    public static function updateCursos(int $idAlumno, array $cursos): void {
        $db = Conexion::getConexion();

        // Borrar matrículas actuales
        $stmt = $db->prepare("DELETE FROM matriculas WHERE alumno_id = ?");
        $stmt->execute([$idAlumno]);

        // Insertar nuevas
        $stmt = $db->prepare(
            "INSERT INTO matriculas (alumno_id, curso_id) VALUES (?, ?)"
        );

        foreach ($cursos as $cursoId) {
            $stmt->execute([$idAlumno, $cursoId]);
        }
    }

    public static function delete(int $id): void {
        $db = Conexion::getConexion();

        $db->prepare("DELETE FROM matriculas WHERE alumno_id = ?")
        ->execute([$id]);

        $db->prepare("DELETE FROM alumnos WHERE id = ?")
        ->execute([$id]);
    }

    

}