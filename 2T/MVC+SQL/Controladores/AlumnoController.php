<?php
namespace App\Controladores;

use App\Modelos\Alumno;
use App\Modelos\Curso;

class AlumnoController {

    public function index() {
        $alumnos = Alumno::getAll();
        require __DIR__ . '/../Vistas/Alumnos/Lista.php';
    }

    public function crear() {
        $cursos = Curso::getAll();
        $alumnos_cursos = [];
        require __DIR__ . '/../Vistas/Alumnos/Form.php';
    }

    public function guardar() {

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $curso_id = $_POST['curso_id'] ?? [];
        $id = $_POST['id'] ?? null;

        if ($id) {
            Alumno::actualizar($id, $nombre, $email, $curso_id);
            $alumno_id = $id;
        } else {
            Alumno::insert($nombre, $email, $curso_id);
        }

        Alumno::guardarCursos($alumno_id, $curso_id);

        header("Location: index.php?controller=alumno&action=index");
    }

    public static function editar() {

        $id = $_GET["id"] ?? null;
        $alumno = Alumno::obtenerPorID($id);
        $cursos = Curso::getAll();

        $alumno_cursos = Alumno::obtenerIdsCursos($id) ?: [];

        require_once "../Vistas/Alumnos/Form.php";

    }

    public static function borrar() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            Alumno::eliminar($id);

        }

        header("Location: index.php?controller=alumno&action=index");
    }

}