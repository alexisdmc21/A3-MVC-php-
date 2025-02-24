<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../services/AutorService.php';


class AutorController
{
    private $autorService;

    public function __construct()
    {

        // Establece la conexión con la base de datos y crea una instancia del servicio de autores
        $database = new Database();
        $db = $database->getConnection();
        $this->autorService = new AutorService($db);
    }

    // Obtiene y devuelve todos los autores en formato JSON
    public function index()
    {
        $result = $this->autorService->getAll();
        echo json_encode($result);
    }

    /*Busca un autor por su ID y devuelve sus datos en formato JSON
    y si el autor no se encuentra, devuelve un error 404.*/
    public function show($id)
    {
        $result = $this->autorService->getById($id);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'No se encontro el autor']);
        }
    }

    // Estas funciones reciben datos en formato JSON y proceden a realizar las siguientes operaciones
    
    //Crea un nuevo autor en la base de datos bd-proyecto
    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));//Convierte un objeto JSON en objeto PHP y guarda en $data
        
        $nombre = htmlspecialchars(strip_tags($data->nombre));
        $apellido = htmlspecialchars(strip_tags($data->apellido));
        $nacionalidad = htmlspecialchars(strip_tags($data->nacionalidad));
        //Condicional if para comprobar que los campos no esten vacios para crear el autor.
        if (!empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad) && !empty($data->fechaNacimiento)) {
            
            $data->nombre = $nombre;
            $data->apellido = $apellido;
            $data->nacionalidad = $nacionalidad;
            
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

     //Actualiza un autor en la base de datos.
    public function update()
    {
        $data = json_decode(file_get_contents('php://input'));//Convierte un objeto JSON en objeto PHP y guarda en $data
        
        //Condicional if para comprobar que los campos no esten vacios para que se actualice el autor.
        if (!empty($data->id) && !empty($data->nombre) && !empty($data->apellido) && !empty($data->nacionalidad) && !empty($data->fechaNacimiento)) {
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

    //Elimina el autor correspondiente de la base de datos.
    public function destroy()
    {
        $data = json_decode(file_get_contents('php://input'));//Convierte un objeto JSON en objeto PHP y guarda en $data
        
        //Condicional if para verificar que los datos esten completos en la ejecucion
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
