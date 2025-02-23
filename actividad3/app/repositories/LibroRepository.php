<?php
require_once __DIR__ . '/../models/Libro.php';

class LibroRepository{
    private $conn;
    private $table_name = "libros";

    public function __construct($db){
        $this->conn = $db;
    }

    public function readAll(){
        $query = "SELECT l.*, a.nombre as autor_nombre
        FROM {$this->table_name} l
        INNER JOIN autores a ON l.autores_id = a.id";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
    }

    public function create(Libro $libro){
        $query = "INSERT INTO {$this->table_name} (titulo,fechaPublicacion,genero,isbn,precio,cantidad,autores_id) 
        VALUES (:titulo,:fechaPublicacion,:genero,:isbn,:precio,:cantidad,:autores_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $libro->getTitulo());
        $stmt->bindParam(':fechaPublicacion', $libro->getFechaPublicacion());
        $stmt->bindParam(':genero', $libro->getGenero());
        $stmt->bindParam(':isbn', $libro->getIsbn());
        $stmt->bindParam(':precio', $libro->getPrecio());
        $stmt->bindParam(':cantidad', $libro->getCantidad());
        $stmt->bindParam(':autores_id', $libro->getAutoresId());
        return $stmt->execute();
        }

    public function update(Libro $libro){
        $query = "UPDATE {$this->table_name}
        SET titulo = :titulo, fechaPublicacion = :fechaPublicacion, genero = :genero, isbn = :isbn, precio = :precio, cantidad = :cantidad, autores_id = :autores_id
        WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':titulo', $libro->getTitulo());
    $stmt->bindParam(':fechaPublicacion', $libro->getFechaPublicacion());
    $stmt->bindParam(':genero', $libro->getGenero());
    $stmt->bindParam(':isbn', $libro->getIsbn());
    $stmt->bindParam(':precio', $libro->getPrecio());
    $stmt->bindParam(':cantidad', $libro->getCantidad());
    $stmt->bindParam(':autores_id', $libro->getAutoresId());
    $stmt->bindParam(':id', $libro->getId());
    return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function readOne($id){
        $query = "SELECT l.*, a.nombre as autor_nombre
                  FROM {$this->table_name} l
                  INNER JOIN autores a ON l.autores_id = a.id
                  WHERE l.id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>