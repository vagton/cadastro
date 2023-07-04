<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o autoloader do Composer
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../src/Controllers/ProdutosController.php';
require __DIR__ . '/../src/Controllers/CategoriasController.php';

// Importar as classes dos controladores
use App\Controllers\CategoriasController;
use App\Controllers\ProdutosController;

// Definir o mapeamento das rotas
$routes = [
    '/backend/public/categorias' => CategoriasController::class,
    '/backend/public/produtos' => ProdutosController::class . ':listProdutos' // Atualizado para usar o nome correto do método
];

// Obter a URL da requisição
$requestUrl = $_SERVER['REQUEST_URI'];

// Verificar se a rota está mapeada
if (array_key_exists($requestUrl, $routes)) {

    // Instanciar o controlador correspondente
    $controllerClassName = $routes[$requestUrl];
    //$controller = new $controllerClassName();
    list($controllerClassName, $methodName) = explode(':', $controllerMethod);
    $controller = new $controllerClassName();
var_dump($controller);
    // Chamar o método apropriado no controlador
    //$method = 'listarProdutos';
    //$controller->$method();
    //$controller->handle();
} else {
    // Rota não encontrada
    echo 'Rota não encontrada.';
}

