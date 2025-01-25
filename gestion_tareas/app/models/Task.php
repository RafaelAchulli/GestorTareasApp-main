<?php
require_once "../config/database.php";
class Task {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    public function crear($nombre, $descripcion) {
        session_start();

        $query = "INSERT INTO tareas (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }
    public function listar() {
        $query = "SELECT * FROM tareas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function completar($id) {
        $query = "UPDATE tareas SET estado = 'completada' WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function pendiente($id) {
        $query = "UPDATE tareas SET estado = 'pendiente' WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        session_start();
    
        $query = "DELETE FROM tareas WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function seleccionar($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tareas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $descripcion) {
        $stmt = $this->conn->prepare("UPDATE tareas SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }

}