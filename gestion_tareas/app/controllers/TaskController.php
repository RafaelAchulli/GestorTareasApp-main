<?php
require_once "../app/models/Task.php";
require_once '../app/models/PDFGenerator.php';

class TaskController { 
    private $task;
    public function listar() {
        $taskModel = new Task();
        $tasks = $taskModel->listar();
        require_once "../app/views/task_list.php";
    }

    public function crear() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $task = new Task();
            $task->crear($_POST['nombre'], $_POST['descripcion']);
            header("Location:../public/index.php?controller=TaskController&action=listar");
        } else {
            require "../app/views/task_list.php";
        }
    }

    public function completar() {
        $task = new Task();
        $task->completar($_GET['id']);
        header("Location:../public/index.php?controller=TaskController&action=listar");
    }
    public function pendiente() {
        $task = new Task();
        $task->pendiente($_GET['id']);
        header("Location:../public/index.php?controller=TaskController&action=listar");
    }

    public function eliminar() {
        $task = new Task();
        $task->eliminar($_GET['id']);
        header("Location:../public/index.php?controller=TaskController&action=listar");
    }

    public function generarPDF() {
        $taskModel = new Task();
        $tasks = $taskModel->listar();
        PDFGenerator::generar($tasks);
    }

    public function editar() {
        $taskModel = new Task();
        $task = $taskModel->seleccionar($_GET['id']);
        require_once '../app/views/task_edit.php';
    }

    public function actualizar() {
        $taskModel = new Task();
        $task = $taskModel->actualizar($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        header("Location:../public/index.php?controller=TaskController&action=listar");
    }
}