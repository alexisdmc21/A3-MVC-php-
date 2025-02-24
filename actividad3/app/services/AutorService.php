<?php
require_once __DIR__ .'/../repositories/AutorRepository.php';
require_once __DIR__ .'/../models/Autor.php';




class AutorService{
    private $autorRepository;

    public function __construct($db){
        $this->autorRepository=new AutorRepository($db);
    }

    //Funcion que obtiene todos los autores de la base de datos y los devuelve como un arreglo asociativo.
    public function getAll(){
        $stmt = $this->autorRepository->readAll();
        $result =[];
        while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[]=$row;
        }
        return $result;
    }

    //Esta funcion permite obtener un autor por su ID y lo devuelve caso contrario si no existe retornara null
    public function getById($id){
        $data = $this->autorRepository->readOne($id);
        return $data ? $data:null;
    }

    //Crea un nuevo autor
    public function create($data){
        $autor = new Autor(); //Crea una nueva instancia de la clase
        $autor->setNombre($data->nombre); //Establece el nombre del autor en data
        $autor->setApellido($data->apellido); //Establece el apellido del autor en data
        $autor->setNacionalidad($data->nacionalidad); //Asigna la nacionalidad del autor con el valor data
        $autor->setFechaNacimiento($data->fechaNacimiento); //Guarda la fecha de nacimiento del autor con el valor data
        return $this->autorRepository->create($autor); //Llama al método create del repositorio para crear el autor
    }


    //Funcion que actualiza los datos del autor (del mismo modo en cada linea hace lo mismo para actualizar)
    public function update ($data){
        $autor = new Autor();
        $autor->setId($data->id);
        $autor->setNombre($data->nombre);
        $autor->setApellido($data->apellido);
        $autor->setNacionalidad($data->nacionalidad);
        $autor->setFechaNacimiento($data->fechaNacimiento);
        return $this->autorRepository->update($autor); //Llama al método update del repositorio para actualizar la información del autor
    }

    //Elimina un autor de la base de datos según su ID.
    public function delete ($id){
        return $this->autorRepository->delete($id); //Llama al método delete del repositorio para eliminar el autor
    }
}


?>