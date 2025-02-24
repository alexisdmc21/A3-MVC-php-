<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../repositories/LibroRepository.php';

class LibroService{
    private $libroRepository;

    public function __construct($db){
        $this->libroRepository = new LibroRepository($db);
    }

    //Funcion que obtiene todos los autores de la base de datos y los devuelve como un arreglo asociativo.
    public function getAll(){
        $stmt = $this->libroRepository->readAll();
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
        return $result;
    }

    //Esta funcion permite obtener un autor por su ID y lo devuelve caso contrario si no existe retornara null
    public function getById($id){
        $data = $this->libroRepository->readOne($id);
        return $data ? $data : null;
    }

    //Crea un nuevo autor
    public function create($data){
        $libro = new Libro(); //Crea una nueva instancia de la clase
        $libro->setTitulo($data->titulo); //Establece el titulo del libro en data
        $libro->setFechaPublicacion($data->fechaPublicacion); //Establece la fecha de publicacion del libro en data
        $libro->setGenero($data->genero); //Establece el genero del libro en data
        $libro->setIsbn($data->isbn); //Establece el ISBN del libro en data
        $libro->setPrecio($data->precio); //Se asigna el precio del libro en data
        $libro->setCantidad($data->cantidad); //Se asigna la cantidad de libros en data
        $libro->setAutoresId($data->autores_id); //Se asigna el respectivo autor
        return $this->libroRepository->create($libro); ////Llama al método create del repositorio para crear el libro
    }

    //Funcion que actualiza los datos del libro (del mismo modo en cada linea hace lo mismo para actualizar)
    public function update($data){
        $libro = new Libro();
        $libro->setId($data->id);
        $libro->setTitulo($data->titulo);
        $libro->setFechaPublicacion($data->fechaPublicacion);
        $libro->setGenero($data->genero);
        $libro->setIsbn($data->isbn);
        $libro->setPrecio($data->precio);
        $libro->setCantidad($data->cantidad);
        $libro->setAutoresId($data->autores_id);
        return $this->libroRepository->update($libro); //Llama al método update del repositorio para actualizar la información del libro
    }

    //Elimina un libro de la base de datos según su ID.
    public function delete($id){
        return $this->libroRepository->delete($id); //Llama al método delete del repositorio para eliminar el libro
    }
}

?>