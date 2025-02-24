<?php
require_once __DIR__ . '/../services/LibroService.php';
require_once __DIR__ . '/../../config/database.php';

class LibroController
{
    private $libroService;

    public function __construct()
    {

        // Establece la conexión con la base de datos y crea una instancia del servicio de libros
        $database = new Database();
        $db = $database->getConnection();
        $this->libroService = new LibroService($db);
    }

    // Obtiene y devuelve todos los libros en formato JSON
    public function index()
    {
        $result = $this->libroService->getAll();
        echo json_encode($result);
    }

    /*Busca un libro por su ID y devuelve sus datos en formato JSON
    y si el libro no se encuentra, devuelve un error 404.*/
    public function show($id)
    {
        $result = $this->libroService->getById($id);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'No se encontro el libro']);
        }
    }

    // Estas funciones reciben datos en formato JSON y proceden a realizar las siguientes operaciones
    
    //Crea un nuevo libro en la base de datos bd-proyecto
    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));//Convierte un objeto JSON en objeto PHP y guarda en $data
        
        //Se sanitizan los campos con htmlspecialchars, adicionalmente con strip_tags que elimina los caracteres especiales
        //cabe recalcar que en guias pude ver que al usar BD no hace la misma funcion los htmlspecialchars por eso se hace el uso de strip_tags
        $titulo = htmlspecialchars(strip_tags($data->titulo)); 
        $fechaPublicacion = htmlspecialchars(strip_tags($data->fechaPublicacion)); 
        $genero = htmlspecialchars(strip_tags($data->genero)); 
        $isbn = htmlspecialchars(strip_tags($data->isbn)); 
        $precio = isset($data->precio) ? (float) $data->precio : 0.0; //Se hace la conversion a numero flotante
        $cantidad = isset($data->cantidad) ? (int) $data->cantidad : 0; //se hace la conversion a numero entero
        $autores_id = htmlspecialchars(strip_tags($data->autores_id));

        //Condicional if para comprobar que los campos no esten vacios para crear el libro.
        if (!empty($data->titulo) && !empty($data->fechaPublicacion) && !empty($data->genero) && !empty($data->isbn) && !empty($data->precio) && !empty($data->cantidad) && !empty($data->autores_id)) {
            
            $data->titulo = $titulo;
            $data->fechaPublicacion = $fechaPublicacion;
            $data->genero = $genero;
            $data->isbn = $isbn;
            $data->precio = $precio;
            $data->cantidad = $cantidad;
            $data->autores_id = $autores_id;

            if ($this->libroService->create($data)) {
                http_response_code(201);
                echo json_encode(['message' => 'Libro creado satisfactoriamente']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al crear libro']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Datos incompletos']);
        }
    }

    //Actualiza un libro en la base de datos.
    public function update()
    {
        $data = json_decode(file_get_contents('php://input')); //Convierte un objeto JSON en objeto PHP y guarda en $data
        
        //Se sanitizan los campos con htmlspecialchars, adicionalmente con strip_tags que elimina los caracteres especiales
        $titulo = htmlspecialchars(strip_tags($data->titulo)); 
        $fechaPublicacion = htmlspecialchars(strip_tags($data->fechaPublicacion)); 
        $genero = htmlspecialchars(strip_tags($data->genero)); 
        $isbn = htmlspecialchars(strip_tags($data->isbn)); 
        $precio = isset($data->precio) ? (float) $data->precio : 0.0;
        $cantidad = isset($data->cantidad) ? (int) $data->cantidad : 0;
        $autores_id = htmlspecialchars(strip_tags($data->autores_id));

        //Condicional if para comprobar que los campos no esten vacios para que se actualice el libro.
        if (!empty($data->id) && !empty($data->titulo) && !empty($data->fechaPublicacion) && !empty($data->genero) && !empty($data->isbn) && !empty($data->precio) && !empty($data->cantidad) && !empty($data->autores_id)) {
            
            $data->titulo = $titulo;
            $data->fechaPublicacion = $fechaPublicacion;
            $data->genero = $genero;
            $data->isbn = $isbn;
            $data->precio = $precio;
            $data->cantidad = $cantidad;
            $data->autores_id = $autores_id;
            
            if ($this->libroService->update($data)) {
                echo json_encode(['message' => 'Libro actualizado satisfactoriamente']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al actualizar libro']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'No se encontro el libro']);
        }
    }

    //Elimina el libro correspondiente de la base de datos.
    public function destroy()
    {
        $data = json_decode(file_get_contents('php://input'));//Convierte un objeto JSON en objeto PHP y guarda en $data

        //Condicional if para verificar que los datos esten completos en la ejecucion
        if (!empty($data->id)) {
            if ($this->libroService->delete($data->id)) {
                echo json_encode(['message' => 'Libro eliminado satisfactoriamente']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al eliminar libro']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'No se encontro el libro']);
        }
    }
}
