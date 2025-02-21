<?php
require_once __DIR__ . '/../services/AutorService.php';
require_once __DIR__ . '/../../config/database.php';

class AutorController
{
    private $autorService;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->autorService = new AutorService($db);
    }

    public function index()
    {
        $resut = $this->autorService->getAll();
        echo json_encode($resut);
    }

    public function show($id)
    {
        $resut = $this->autorService->getById($id);
        if ($resut) {
            echo json_encode($resut);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'No se encontro el autor']);
        }
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad) && !empty($data->fechaNacimiento)) {
            if ($this->autorService->create($data)) {
                http_response_code(201);
                echo json_encode(['message' => 'Autor creado satisfactoriamente']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al crear autor']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Error al crear autor, datos incompletos']);
        }
    }

    public function update()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (!empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad) && !empty($data->fechaNacimiento)) {
            if ($this->autorService->update($data)) {
                echo json_encode(['message' => 'Autor actualizado satisfactoriamente']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'Error al actualizar autor']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Error al actualizar autor, datos incompletos']);
        }
    }

    public function destroy()
    {
        $data = json_decode(file_get_contents('php://input'));
        if(!empty($data->id)){
            if($this->autorService->delete($data->id)){
                echo json_encode(['message' => 'Autor eliminado satisfactoriamente']);
            }else{
                http_response_code(503);
                echo json_encode(['message' => 'Error al eliminar autor']);
            }
        }else{
            http_response_code(400);
            echo json_encode(['message' => 'Error al eliminar autor, ID no proporcionado']);
        }
    }
}
?>
