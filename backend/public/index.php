<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o autoloader do Composer
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../src/Controllers/ProdutosController.php';
require __DIR__ . '/../src/Controllers/CategoriasController.php';
require_once __DIR__ . '../../src/Config/web.php';
require_once __DIR__ . '../../src/Controllers/Router.php';
// Importar as classes dos controladores
use App\Controllers\CategoriasController;
use App\Controllers\ProdutosController;
use App\Controllers\Router;


$requestUri = $_SERVER['REQUEST_URI'];
$router = new Router();
$router->run($requestUri);

?>
