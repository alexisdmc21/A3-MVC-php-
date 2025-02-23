<?php
require_once __DIR__ .'/../repositories/AutorRepository.php';
require_once __DIR__ .'/../models/Autor.php';




class AutorService{
    private $autorRepository;

    public function __construct($db){
        $this->autorRepository=new AutorRepository($db);
    }

    public function getAll(){
        $stmt = $this->autorRepository->readAll();
        $result =[];
        while ($row =  $stmt->fetch(PDO::FETCH_ASSOC)){//dice se convierat un arreglo asociativo
          $result[]=$row;
        }
        return $result;
    }

    public function getById($id){
        $data = $this->autorRepository->readOne($id);
        return $data ? $data:null;
    }

    public function create($data){
        $autor = new Autor();
        $autor->setNombre($data->nombre);
        $autor->setApellido($data->apellido);
        $autor->setNacionalidad($data->nacionalidad);
        $autor->setFechaNacimiento($data->fechaNacimiento);
        return $this->autorRepository->create($autor);
    }

    public function update ($data){
        $autor = new Autor();
        $autor->setId($data->id);
        $autor->setNombre($data->nombre);
        $autor->setApellido($data->apellido);
        $autor->setNacionalidad($data->nacionalidad);
        $autor->setFechaNacimiento($data->fechaNacimiento);
        return $this->autorRepository->update($autor);
    }

    public function delete ($id){
        return $this->autorRepository->delete($id);
    }
}


?>