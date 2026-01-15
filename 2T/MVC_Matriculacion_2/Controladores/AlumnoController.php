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
        require __DIR__ . '/../Vistas/Alumnos/Form.php';
    }

    public function guardar() {
        Alumno::insert(
            $_POST['nombre'],
            $_POST['email'],
            $_POST['cursos'] ?? []
        );

        header("Location: index.php?controller=alumno");
    }

    public function editar() {
    $alumno = Alumno::getById($_GET['id']);
    $cursos = Curso::getAll();
    require __DIR__ . '/../Vistas/Alumnos/Edit.php';
    }

    public function actualizar() {
        Alumno::update($_POST['id'], $_POST['nombre'], $_POST['email']);
        Alumno::updateCursos($_POST['id'], $_POST['cursos'] ?? []);
        header("Location: index.php?controller=alumno");
    }

    public function borrar() {
        Alumno::delete($_GET['id']);
        header("Location: index.php?controller=alumno");
    }
}