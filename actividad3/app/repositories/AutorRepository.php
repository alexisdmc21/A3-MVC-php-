<?php
require_once __DIR__ .'/../models/Autor.php';

  class  AutorRepository{
    private $conn;
    private $table_name="autores";

    public function __construct($db){
       $this->conn=$db;
    }
     
    public function create(Autor $autor){
        $query = "INSERT INTO {$this->table_name} (nombre,apellido,nacionalidad,fechaNacimiento) VALUES (:nombre, :apellido, :nacionalidad, :fechaNacimiento)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre",$autor->getNombre());
        $stmt->bindParam(":apellido", $autor->getApellido());
        $stmt->bindParam(":nacionalidad", $autor->getNacionalidad());
        $stmt->bindParam(":fechaNacimiento", $autor->getFechaNacimiento());
        return $stmt->execute();

      }

      public function readAll(){
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
      }

      public function update(Autor $autor){
      $query = "UPDATE {$this->table_name} SET nombre = :nombre, apellido = :apellido, nacionalidad = :nacionalidad, fechaNacimiento = :fechaNacimiento WHERE id=:id";
      $stmt = $this->conn->prepare($query);
      $stmt ->bindParam(":nombre",$autor->getNombre());
      $stmt ->bindParam(":apellido", $autor->getApellido());
      $stmt->bindParam(":nacionalidad", $autor->getNacionalidad());
      $stmt->bindParam(":fechaNacimiento", $autor->getFechaNacimiento());
      $stmt ->bindParam(":id",$autor->getId());
      return $stmt->execute();
 
    }
     
    public function delete($id){
      $query = "DELETE FROM {$this->table_name} WHERE id= :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(":id",$id);
      return $stmt->execute();
    }

    public function readOne($id){
      $query = "SELECT * FROM {$this->table_name} WHERE id =:id LIMIT 0,1";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam("id",$id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
?>