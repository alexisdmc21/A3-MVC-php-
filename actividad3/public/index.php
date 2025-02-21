<?
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/AutorController.php';
require_once __DIR__ . '/../app/controllers/LibroController.php';

$router = new Router();

$autorController = new AutorController();
$router -> add('GET', '/autores', fn() => $autorController -> index());
$router -> add('GET', '/autores/:id', fn($id) => $autorController -> show($id));
$router -> add('POST', '/autores', fn() => $autorController -> store());
$router -> add('PUT', '/autores', fn() => $autorController -> update());
$router -> add('DELETE', '/autores', fn() => $autorController -> destroy());

$libroController = new LibroController();
$router -> add('GET', '/libros', fn() => $libroController -> index());
$router -> add('GET', '/libros/:id', fn($id) => $libroController -> show($id));
$router -> add('POST', '/libros', fn() => $libroController -> store());
$router -> add('PUT', '/libros', fn() => $libroController -> update());
$router -> add('DELETE', '/libros', fn() => $libroController -> destroy());

$uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path ='/proyecto/public';
if(strpos($uri, $base_path) === 0){
    $uri = substr($uri, strlen($base_path));
}
if($uri == ''){
    $uri = '/';
}

$router -> dispatch($_SERVER['REQUEST_METHOD'], $uri);
?>