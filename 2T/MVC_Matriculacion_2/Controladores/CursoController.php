<?php
namespace App\Controladores;

use App\Modelos\Curso;

class CursoController {

    public function index() {
        $cursos = Curso::getAll();
        require __DIR__ . '/../Vistas/Cursos/Lista.php';
    }

    public function crear() {
        require __DIR__ . '/../Vistas/Cursos/Form.php';
    }

    public function guardar() {
        Curso::insert($_POST['nombre'], $_POST['duracion'], $_POST['precio']);
        header("Location: index.php?controller=curso");
    }

    public function borrar() {
        Curso::delete($_GET['id']);
        header("Location: index.php?controller=curso");
    }
}