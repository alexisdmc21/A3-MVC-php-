<?php
require_once __DIR__ . '/../services/LibroService.php';
require_once __DIR__ . '/../../config/database.php';

class LibroController
{
    private $libroService;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->libroService = new LibroService($db);
    }

    public function index()
    {
        $result = $this->libroService->getAll();
        echo json_encode($result);
    }

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

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!empty($data->titulo) && !empty($data->fechaPublicacion) && !empty($data->genero) && !empty($data->isbn) && !empty($data->precio) && !empty($data->cantidad) && !empty($data->autores_id)) {
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

    public function update()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!empty($data->titulo) && !empty($data->fechaPublicacion) && !empty($data->genero) && !empty($data->isbn) && !empty($data->precio) && !empty($data->cantidad) && !empty($data->autores_id)) {
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

    public function destroy()
    {
        $data = json_decode(file_get_contents('php://input'));
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
