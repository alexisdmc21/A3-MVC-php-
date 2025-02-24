<?php
require_once __DIR__ .'/../models/Autor.php';

  class  AutorRepository{
    private $conn;
    private $table_name="autores";


    //Recibe la conexión a la base de datos y lo almacena
    public function __construct($db){
       $this->conn=$db;
    }
     
    //Funcion que permite la inserción de un nuevo autor en la base de datos
    public function create(Autor $autor){
        $query = "INSERT INTO {$this->table_name} (nombre,apellido,nacionalidad,fechaNacimiento) VALUES (:nombre, :apellido, :nacionalidad, :fechaNacimiento)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre",$autor->getNombre());
        $stmt->bindParam(":apellido", $autor->getApellido());
        $stmt->bindParam(":nacionalidad", $autor->getNacionalidad());
        $stmt->bindParam(":fechaNacimiento", $autor->getFechaNacimiento());
        return $stmt->execute();

      }

      //Funcion que recupera todos los registros de la tabla 
      public function readAll(){
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
      }

      //Funcion que actualiza los datos de un autor existente
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
     
    //Funcion que elimina un autor de la base de datos tomando su ID
    public function delete($id){
      $query = "DELETE FROM {$this->table_name} WHERE id= :id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(":id",$id);
      return $stmt->execute();
    }

    //Funcion que obtiene un solo autor por su ID y devuelve la información relacionada.
    public function readOne($id){
      $query = "SELECT * FROM {$this->table_name} WHERE id =:id LIMIT 0,1";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam("id",$id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
?>