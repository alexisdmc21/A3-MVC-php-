<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../repositories/LibroRepository.php';

class LibroService{
    private $libroRepository;

    public function __construct($db){
        $this->libroRepository = new LibroRepository($db);
    }

    public function getAll(){
        $stmt = $this->libroRepository->readAll();
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $resul[] = $row;
        }
        return $result;
    }

    public function getById($id){
        $data = $this->libroRepository->readOne($id);
        return $data ? $data : null;
    }

    public function create($data){
        $libro = new Libro();
        $libro->setTitulo($data->titulo);
        $libro->setAnioPublicacion($data->anio_publicacion);
        $libro->setGenero($data->genero);
        $libro->setIsbn($data->isbn);
        $libro->setPrecio($data->precio);
        $libro->setCantidad($data->cantidad);
        $libro->setAutoresId($data->autores_id);
        return $this->libroRepository->create($libro);
    }

    public function update($data){
        $libro = new Libro();
        $libro->setTitulo($data->titulo);
        $libro->setAnioPublicacion($data->anio_publicacion);
        $libro->setGenero($data->genero);
        $libro->setIsbn($data->isbn);
        $libro->setPrecio($data->precio);
        $libro->setCantidad($data->cantidad);
        $libro->setAutoresId($data->autores_id);
        return $this->libroRepository->update($libro);
    }

    public function delete($id){
        return $this->libroRepository->delete($id);
    }
}

?>